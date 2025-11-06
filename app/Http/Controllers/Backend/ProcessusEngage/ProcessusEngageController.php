<?php

namespace App\Http\Controllers\Backend\ProcessusEngage;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\DocumentEtape;
use App\Models\Etape;
use App\Models\Level;
use App\Models\Processus;
use App\Models\Projet;
use Dom\Document;
use Illuminate\Http\Request;
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

    public function setFistEtapeProcessus($processus_id)
    {
        $processus = Processus::find($processus_id);
        $firstEtape = Etape::with('Metadonnees','DocumentEtape.TypeDocument')->where('processus_id', $processus_id)
            ->where('ordre', 1)
            ->first();
        return view($this->view . '.form-etape-processus', compact('firstEtape','processus'));
       
    }

    public function storeEtapeProcessus(Request $request)
    {
        // Logique pour stocker les données de l'étape du processus initié
        // Vous pouvez accéder aux données du formulaire via $request->input('nom_du_champ')
        // Par exemple :
        // $processusId = $request->input('processus_id');
        // $departementId = $request->input('departement_id');
        // $projetId = $request->input('projet_id');
        // etc.

        // Après avoir traité et stocké les données, vous pouvez retourner une réponse JSON
        return response()->json(['status' => TRUE, 'message' => 'Processus initié avec succès']);
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
            $response = ['status' => TRUE, 'message' => 'Data berhasil disimpan'];
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
