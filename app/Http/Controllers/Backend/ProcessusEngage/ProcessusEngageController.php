<?php

namespace App\Http\Controllers\Backend\ProcessusEngage;

use App\Http\Controllers\Controller;
use App\Models\AnneeFiscale;
use App\Models\Departement;
use App\Models\DocumentEtape;
use App\Models\DocumentEtapeUpload;
use App\Models\Etape;
use App\Models\Level;
use App\Models\Processus;
use App\Models\ProcessusEngage;
use App\Models\ProcessusMongo;
use App\Models\Projet;
use App\Models\User;
use App\Models\UserAssigneEtape;
use Dom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Process;

class ProcessusEngageController extends Controller
{
    public function index()
    {
        return view($this->view . '.index');
    }

    public function initier(Request $request)
    {
        $user = $request->user();

        // Récupération du niveau générique
        $level_generique = Level::where('code', 'user')->first();

        // Récupération des processus liés à l'étape avec les conditions

        $listProcessus = Etape::with('processus')
            ->where(function ($query) use ($user, $level_generique) {
                $query->where('level_id', $user->level_id)
                    ->orWhere('level_id', $level_generique->id);
            })
            ->where('ordre', 1)
            ->get()
            ->pluck('processus.lib_processus', 'processus.id');


        return view($this->view . '.initiation-processus.initier', compact('listProcessus'));
    }

    public function create()
    {
        return view($this->view . '.create');
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data = $this->model::with('projet', 'departement', 'processus');
        return datatables()->of($data)
            ->addColumn('action', function ($data) use ($user) {
                $button = '';
                if ($user->read) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="' . $this->url . '" data-id="' . $data->id . '" title="Tampilkan"><i class="fa fa-eye text-info"></i></button>';
                }
                if ($user->update) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="' . $this->url . '" data-id="' . $data->id . '" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
                }
                if ($user->delete) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="' . $this->url . '" data-id="' . $data->id . '" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>" . $button . "</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function getEntites(Request $request, $type)
    {
        $user = $request->user();
        if ($type === 'departement') {
            return $this->userDepartement($user->id);
        } elseif ($type === 'projet') {
            return $this->userProjet($user->id);
        } else {
            return collect();
        }

    }

    public function userDepartement($userId)
    {
        $departement = Departement::with('MembresProjet')
            ->whereHas('MembresDepartement', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->pluck('dep_name', 'id');

        return response()->json($departement);
    }

    public function userProjet($userId)
    {
        $projets = Projet::where(function ($query) use ($userId) {
            $query->whereHas('membresProjet', function ($q) use ($userId) {
                $q->where('user_id', $userId)
                    ->whereNull('deleted_at');
            })->orWhere('id_manager', $userId);
        })
            ->whereNull('deleted_at')
            ->pluck('short_name', 'id');
        $list = response()->json($projets);
        return $list;
    }

    public function selectionProcessus($prcessus_id)
    {
        $processus = Processus::find($prcessus_id);
        $etapes = Etape::with('level')->where('processus_id', $prcessus_id)->sort()->get();
        $dureeProcessus = Etape::where('processus_id', $prcessus_id)->sum('delai');
        return view($this->view . '.initiation-processus.selection-processus', compact('processus', 'etapes', 'dureeProcessus'));
    }

    public function setEtapeProcessus($processus_id, $ordretape)
    {
        $ordretape = $ordretape+1;
        $processus = Processus::find($processus_id);
        $curentEtape = Etape::with('Metadonnees', 'DocumentEtape.TypeDocument')->where('processus_id', $processus_id)
            ->where('ordre', $ordretape)
            ->first();
        $nextEtape = Etape::with('Metadonnees', 'DocumentEtape.TypeDocument')->where('processus_id', $processus_id)
            ->where('ordre', $curentEtape->ordre + 1)
            ->first();
        $nextEtapeUsers = User::where('level_id', $nextEtape->level_id)
            ->selectRaw("CONCAT(first_name, ' ', last_name, ' (', email, ')') AS full_name, id")
            ->pluck('full_name', 'id');

        return view($this->view . '.form-etape-processus', compact('curentEtape', 'nextEtape', 'nextEtapeUsers', 'processus'));

    }

    public function getUsers($option, $level)
    {
        if ($option == 'more') {
            $users = User::selectRaw("CONCAT(first_name, ' ', last_name, ' (', email, ')') AS full_name, id")
                ->pluck('full_name', 'id');
        } else {
            $users = User::where('level_id', $level)
                ->selectRaw("CONCAT(first_name, ' ', last_name, ' (', email, ')') AS full_name, id")
                ->pluck('full_name', 'id');
        }
        return response()->json($users);

    }



    public function storeProcessusInit(Request $request)
    {
        // Définir entite_id en fonction de type_entite

        $request->merge([
            'etat' => 'En cours',
            'etape_id' => $request->etape_next_id,
            'initiate_by' => $request->user()->id,
        ]);

        DB::beginTransaction();
        try {
            $processusEngage = ProcessusEngage::create($request->all());

            $currentEtape = Etape::with(['Metadonnees', 'DocumentEtape'])
                ->findOrFail($request->etape_current_id);

            $saveMeta = $this->saveMetadonnee($request, $currentEtape, $processusEngage->id);
            $saveDocument = $this->saveDocumentEtape($request, $currentEtape, $processusEngage->id);
            $saveFirstEtape = $this->assignationPremiereEtape($request->etape_current_id, $request->user()->id, $processusEngage->id);
            $saveUsers = $this->saveEtapeUsers($request, $processusEngage->id, $request->user()->id);

            if ($saveMeta && $saveDocument && $saveUsers && $saveFirstEtape) {
                DB::commit();
                return response()->json(['status' => true, 'message' => 'Données enregistrées avec succès']);
            }

            // Si échec, rollback et suppression
            DB::rollBack();
            $processusEngage->delete();

            return response()->json([
                'status' => false,
                'message' => !$saveMeta ? 'Échec de l\'enregistrement des métadonnées' : 'Échec de l\'enregistrement des documents'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
        }
    }

    public function saveMetadonnee(Request $request, $currentEtape, $processusEngage_id)
    {
        $metas = $currentEtape->Metadonnees;
        if (empty($metas))
            return true;


        $attributes = collect($metas)
            ->mapWithKeys(fn($meta) => [
                $meta->field_name => $request->input($meta->field_name)
            ]) // Ajoute la colonne
            ->toArray();

        $mongodb = DB::connection('mongodb');
        try {
            if ($this->checkCollection($mongodb, $request->collection_name)) {

                $mongodb->selectCollection($request->collection_name)
                    ->updateOne(
                        ['processusEngage_id' => $processusEngage_id], // Critère
                        ['$set' => $attributes], // Données
                        ['upsert' => true] // Crée si non trouvé
                    );

            } else {
                $mongodb->getMongoDB()->createCollection($request->collection_name);
                $mongodb->selectCollection($request->collection_name)
                    ->insertOne(array_merge(['processusEngage_id' => $processusEngage_id], $attributes));

            }
            return true; // Retourne true si l'opération a réussi

        } catch (\Exception $e) {
            return false;
        }
    }

    public function checkCollection($mongodb, $collectionName)
    {
        $collections = $mongodb->getMongoDB()->listCollections();
        foreach ($collections as $collection) {
            if ($collection->getName() === $collectionName) {
                return true;
            }
        }
        return false;
    }

    public function saveDocumentEtape(Request $request, $currentEtape, $processusEngage_id)
    {
        $documents = $currentEtape->DocumentEtape;
        if (empty($documents))
            return true;

        foreach ($documents as $doc) {
            if ($request->hasFile('document_' . $doc->id)) {
                $file = $request->file('document_' . $doc->id);
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                    . '_' . time() . '.' . $file->getClientOriginalExtension();

                $repertoire = $this->getPathDocumentEtape($request->type_entite, $request->entite_id, $request->lib_processus);
                $path = $file->storeAs($repertoire, $filename, 'public');
                $url = asset('storage/' . $path);

                DocumentEtapeUpload::create([
                    'processus_engage_id' => $processusEngage_id,
                    'document_etape_id' => $doc->id,
                    'titre' => $filename,
                    'url' => $url,
                ]);
            }
        }
        return true; // Retourne true si tous les documents ont été traités
    }

    public function getPathDocumentEtape($typeEntite, $entite_id, $processus_lib)
    {
        $entite = match ($typeEntite) {
            'departement' => Departement::find($entite_id)?->dep_name ?? 'inconnu',
            'projet' => 'Programmes/Projets' . Projet::find($entite_id)?->short_name ?? 'inconnu',
            default => 'global',
        };

        $anneeFiscale = AnneeFiscale::where('statut', 'En cours')->value('libelle') ?? date('Y');
        $month = date('m-Y');

        return "{$entite}/{$processus_lib}/{$anneeFiscale}/{$month}";
    }


    public function validerEtape($processusEngage_id, $user_id)
    {
        $userAssign = UserAssigneEtape::where('processus_engage_id', $processusEngage_id)
            ->where('user_id', $user_id)
            ->first();

        if ($userAssign) {
            return $userAssign->update(['approbation' => 'OUI']);
        }

        return false; // Aucun enregistrement trouvé
    }


    public function rejeterEtape($processusEngage_id, $user_id)
    {

        $userAssign = UserAssigneEtape::where('processus_engage_id', $processusEngage_id)
            ->where('user_id', $user_id)
            ->first();

        if ($userAssign) {
            return $userAssign->update(['approbation' => 'NON']);
        }

        return false; // Aucun enregistrement trouvé

    }

    public function assignationPremiereEtape($first_etape_id, $user_id, $processusEngage_id)
    {

        if (
            UserAssigneEtape::create([
                'processus_engage_id' => $processusEngage_id,
                'user_id' => $user_id,
                'etape_id' => $first_etape_id,
                'assignate_by' => $user_id,
                'date_assignation' => now(),
                'approbation' => 'OUI'

            ])
        )
            return true;
        else
            return false;

    }
    public function saveEtapeUsers(Request $request, $processusEngage_id, $assign_by)
    {
        $userIds = $request->input('users', []);

        if (empty($userIds)) {
            return false;
        }
        try {
            foreach ($userIds as $userId) {
                UserAssigneEtape::create([
                    'processus_engage_id' => $processusEngage_id,
                    'user_id' => $userId,
                    'etape_id' => $request->etape_id,
                    'assignate_by' => $assign_by,
                    'date_assignation' => now(),

                ]);

            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }



    public function traitementsProcessus(Request $request)
    {
        $user = $request->user();
        $processusInities = ProcessusEngage::with('processus', 'etape')
            ->where('initiate_by', $user->id)
            ->where('etat', 'En cours')
            ->get();
        $processusAssignes = UserAssigneEtape::with([
            'processusEngage.processus:id,lib_processus,collection_name',
            'processusEngage.projet:id,short_name',
            'processusEngage.departement:id,dep_name',
            'etape:id,nom_etape,delai',
            'assignedByUser:id,first_name,last_name,email',

        ])
            ->where('user_id', $user->id)
            ->where(function ($query) {
                $query->whereNull('approbation')
                    ->orWhereNotIn('approbation', ['OUI', 'NON']);
            })
            ->whereHas('processusEngage', function ($query) {
                $query->where('etat', 'En cours');
            })
            ->get();
        

        return view($this->view . '.traitement.traitement-processus', compact('processusInities', 'processusAssignes'));
    }

    public function listTraitementsProcessus(Request $request)
    {
        $user = $request->user();
        $processusInities = ProcessusEngage::with('processus', 'etape')
            ->where('initiate_by', $user->id)
            ->where('etat', 'En cours')
            ->get();
        $processusAssignes = UserAssigneEtape::with([
            'processusEngage.processus:id,lib_processus,collection_name',
            'processusEngage.projet:id,short_name',
            'processusEngage.departement:id,dep_name',
            'etape:id,nom_etape,delai',
            'assignedByUser:id,first_name,last_name,email',

        ])
            ->where('user_id', $user->id)
            ->whereHas('processusEngage', function ($query) {
                $query->where('etat', 'En cours');
            })
            ->get();

        return view($this->view . '.traitement.all-tables-traitements', compact('processusInities', 'processusAssignes'));
    }

    public function detailsProcessusEngage(Request $request, $processusEngageId)
    {
        $processusEngage = ProcessusEngage::with([
            'processus',
            'etape',
            'initiate_by_user',
            'projet',
            'departement'
        ])->find($processusEngageId);

        $metas = $this->getListMetadonnees($processusEngage->processus->id, $processusEngageId, $processusEngage->processus->collection_name);

        $documents = DocumentEtapeUpload::with('document_etape.TypeDocument')
            ->where('processus_engage_id', $processusEngageId)
            ->whereHas('document_etape.TypeDocument')
            ->get();


        $etapesTraitees = UserAssigneEtape::with(['assignedUser:id,first_name,last_name,email', 'etape:id,nom_etape'])
            ->where('processus_engage_id', $processusEngageId)
            ->orderBy('created_at')->get();

        $allowAction = $this->allowAction($request->user()->id, $processusEngageId);

        return view($this->view . '.traitement.details-processus-engage', compact('processusEngage', 'metas', 'documents', 'etapesTraitees', 'allowAction'));
    }


    public function getListMetadonnees($processus_id, $processusEngageId,$collectionName)
    {
        // Récupération des métadonnées MongoDB

        $metas = DB::connection('mongodb')
            ->selectCollection($collectionName)
            ->findOne(['processusEngage_id' => $processusEngageId]);

        if (!$metas) {
            return []; // Aucun document trouvé
        }

        // Récupération des étapes avec leurs métadonnées
        $etapes = Etape::with('Metadonnees')
            ->where('processus_id', $processus_id)
            ->get();

        $metadonnees = [];

        foreach ($etapes as $etape) {
            foreach ($etape->Metadonnees as $metadonnee) {
                $fieldName = $metadonnee->field_name;
                $libelle_meta = $metadonnee->libelle;

                if ($fieldName && isset($metas[$fieldName])) {
                    $metadonnees[] = [
                        'libelle' => $libelle_meta,
                        'fieldName' => $fieldName,
                        'data' => $metas[$fieldName]
                    ];
                }
            }
        }

        return $metadonnees;
    }

    public function allowAction($user_id, $processusEngage_id)
    {
        $assignation = UserAssigneEtape::where('user_id', $user_id)
            ->where('processus_engage_id', $processusEngage_id)
            ->where(function ($query) {
                $query->whereNull('approbation')
                    ->orWhereNotIn('approbation', ['OUI', 'NON']);
            })
            ->first();
        if($assignation)
            return true;
        return false;
    }



    public function store(Request $request)
    {
        $request->validate([
            'type_entite' => 'required',
            'projet_id' => 'required|exists:projets,id',
            'departement_id' => 'required|exists:departements,id',
            'processus_id' => 'required|exists:processuses,id',
        ]);

        if ($this->model::create($request->all())) {
            $response = ['status' => TRUE, 'message' => 'Données enregistrées avec succès'];
            return true;
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être enregistrées']);
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return view($this->view . '.show', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model::find($id);
        return view($this->view . '.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_entite' => 'required',
            'projet_id' => 'required|exists:projets,id',
            'departement_id' => 'required|exists:departements,id',
            'processus_id' => 'required|exists:processuses,id',
        ]);

        $data = $this->model::find($id);
        if ($data->update($request->all())) {
            $response = ['status' => TRUE, 'message' => 'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être enregistrées']);
    }

    public function delete($id)
    {
        $data = $this->model::find($id);
        return view($this->view . '.delete', compact('data'));
    }

    public function destroy($id)
    {
        $data = $this->model::find($id);
        if ($data->delete()) {
            $response = ['status' => TRUE, 'message' => 'Données supprimées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Echec de la suppresion des donnée']);
    }
}
