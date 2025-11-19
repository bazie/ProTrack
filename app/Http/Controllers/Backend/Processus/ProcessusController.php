<?php

namespace App\Http\Controllers\Backend\Processus;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility;
use App\Models\DocumentEtape;
use App\Models\EtapeMetadonnee;
use App\Models\Etape;
use App\Models\Level;
use App\Models\ProcessusMongo;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProcessusController extends Controller
{
    public function index()
    {
        return view($this->view . '.index');
    }

    public function create()
    {
        return view($this->view . '.create');
    }



    public function data(Request $request)
    {
        $user = $request->user();
        $data = $this->model::withCount('etapes')->get(); // Assure-toi que la relation 'etapes' existe
        return datatables()->of($data)
            ->addColumn('etapes', function ($data) {
                //$url = route('etape.index', ['processus_id' => $row->id]);
                $row_url = $this->url . "/" . $data->id . "/etapes";
                return '<a href="' . $row_url . '" class="manage_etape" ><i>' . $data->etapes_count . ' étape(s)- Gérer les étapes </i></a>';
            })
            ->addColumn('action', function ($data) use ($user) {
                $button = '';
                if ($user->read) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="' . $this->url . '" data-id="' . $data->id . '" title="Voir"><i class="fa fa-eye text-info"></i></button>';
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
            ->rawColumns(['etapes', 'action'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'lib_processus' => 'required',
        ]);
        $data = $request->all();
        $data['collection_name'] = Utility::epurationName($request->lib_processus);
        if ($this->model::create($data)) {

            $mongoDB = DB::connection('mongodb')->getMongoDB();
            $mongoDB->createCollection($data['collection_name']);
            $mongoDB->selectCollection($data['collection_name'])->insertOne(['created_at' => now()]);

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
            'lib_processus' => 'required',
        ]);

        $data = $this->model::find($id);
        $collection_name = Utility::epurationName($request->lib_processus);
        if ($data['collection_name'] != $collection_name) {
            $oldName = $data['collection_name'];
            $data['collection_name'] = $collection_name;

        }
        if ($data->update($request->all())) {

            $mongoDB = DB::connection('mongodb')->getMongoDB();

            if (isset($oldName) && $mongoDB->selectCollection($oldName)->countDocuments() > 0) {
                // Rename existing collection
                $mongoDB->selectCollection($oldName)->rename($collection_name);
            } else {
                // Create new collection
                $mongoDB->createCollection($collection_name);
                $mongoDB->selectCollection($collection_name)->insertOne(['created_at' => now()]);
            }

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
    public function ajaxListProcessus(Request $request)
    {
        return view($this->view . '.listProcessus');
    }
    public function listEtapes($id)
    {
        $etapes = Etape::where('processus_id', $id)->sort()->get();
        $processus = $this->model::find($id);
        return view($this->view . '.list-etape.list-etape-by-processus', compact('etapes', 'processus'));
    }

    public function sortedEtapes(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->loopUpdateListEtapes(json_decode($request->input('sort')));
        }
        return response()->json(['status' => TRUE, 'message' => 'Succès de la mise à jour de la liste des étapes']);
    }

    function loopUpdateListEtapes($etapes)
    {
        if ($etapes) {
            try {
                foreach ($etapes as $key => $dt) {
                    Etape::find($dt->id)->update(['ordre' => $key + 1]);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => FALSE, 'message' => 'Echec de la mise à jour de la liste des étapes']);
            }
        }
    }

    public function createEtape($id)
    {
        $this->view = config('master.app.view.backend') . '.etape';
        $this->page = (object) [
            'code' => 'etape',
            'url' => 'etape',
            'model' => 'Etape',
            'libelle' => 'Etape'
        ];
        $processus = $this->model::find($id);
        $ordre = (Etape::where('processus_id', $id)->count() ?? 0) + 1;
        $levels = Level::all()->pluck('name', 'id');
        $documents = TypeDocument::all();
        $reloadUrl = $this->url . "/" . $id . "/etapes";
        return view($this->view . '.create', compact('processus', 'levels', 'documents', 'ordre', 'reloadUrl'));
    }


    public function storeEtape(Request $request)
    {
        $request->validate([
            'nom_etape' => 'required',
            'ordre' => 'required|integer',
            'processus_id' => 'required',
        ]);
        $data = $request->all();
        if ($etape = Etape::create($data)) {

            // documents_etape peut être array ou valeur simple
            $docs = $request->input('documents_etape', []);
            if (!is_array($docs) && $docs) {
                $docs = [$docs];
            }
            if (count($docs) > 0) {
                $this->storeDocumentEtape($docs, $etape->id);
            }

            // métadonnées : récupérer en arrays de façon sûre
            $metas = $request->input('metadatas', []);
            $types = $request->input('metadata_types', []);
            $requireds = $request->input('is_requireds', []);
            if (!is_array($metas) && $metas) {
                $metas = [$metas];
            }
            if (count($metas) > 0) {
                $this->storeMetadonne($metas, $types, $requireds, $etape->id);
            }

            $response = ['status' => TRUE, 'message' => 'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être enregistrées']);
    }

    public function storeDocumentEtape($listDocs, $etape_id)
    {
        foreach ($listDocs as $doc) {
            if ($doc != null)
                DocumentEtape::create(['etape_id' => $etape_id, 'type_document_id' => $doc]);
        }
    }

    public function storeMetadonne($listMetas, $listTypeDonnee, $listOblibagtoire, $etape_id)
    {
        $i = 0;

        foreach ($listMetas as $meta) {
            // Assuming there's a Model named MetadonneEtape similar to DocumentEtape
            $field_name = Utility::epurationName($meta);
            EtapeMetadonnee::create(['etape_id' => $etape_id, 'libelle' => $meta, 'field_name' => $field_name, 'type_donnee' => $listTypeDonnee[$i], 'obligatoire' => $listOblibagtoire[$i]]);
            $i++;
        }
    }

    public function editEtape($id)
    {
        $this->view = config('master.app.view.backend') . '.etape';

        $etape = Etape::find($id);
        $processus = $this->model::find($etape->processus_id);
        $levels = Level::all()->pluck('name', 'id');

        $documents = TypeDocument::all();
        $documentsEtape = DocumentEtape::where('etape_id', $id)->pluck('type_document_id')->toArray();

        $documents = $documents->map(function ($document) use ($documentsEtape) {
            $document->is_check = in_array($document->id, $documentsEtape) ? 'checked' : '';
            return $document;
        });

        $metadatas = EtapeMetadonnee::where('etape_id', $id)->get();

        return view($this->view . '.edit', compact('etape', 'processus', 'levels', 'documents', 'metadatas'));
    }
    public function updateEtape(Request $request)
    {
        $request->validate([
            'nom_etape' => 'required',
            'processus_id' => 'required',
        ]);
        $etape = Etape::find($request->idEtape);
        if ($etape->update($request->all())) {

            // documents_etape peut être array ou valeur simple
            $docs = $request->input('documents_etape', []);
            if (!is_array($docs) && $docs) {
                $docs = [$docs];
            }
            if (count($docs) > 0) {
                $this->updateEtapeDocuments($docs, $etape->id);
            }

            // métadonnées : récupérer en arrays de façon sûre
            $metas = $request->input('metadatas', []);
            $types = $request->input('metadata_types', []);
            $requireds = $request->input('is_requireds', []);
            if (!is_array($metas) && $metas) {
                $metas = [$metas];
            }
            if (count($metas) > 0) {
                $this->updateEtapeMetadatas($metas, $types, $requireds, $etape->id);
            }

            $response = ['status' => TRUE, 'message' => 'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être enregistrées']);
    }

    public function updateEtapeDocuments($docs, $etape_id)
    {
        $documentsEtape_existant = DocumentEtape::where('etape_id', $etape_id)->pluck('type_document_id')->toArray();
        foreach ($docs as $doc) {
            if (!in_array($doc, $documentsEtape_existant)) {
                DocumentEtape::create(['etape_id' => $etape_id, 'type_document_id' => $doc]);
            }
        }
        foreach ($documentsEtape_existant as $existingDoc) {
            if (!in_array($existingDoc, $docs)) {
                DocumentEtape::where('etape_id', $etape_id)->where('type_document_id', $existingDoc)->delete();
            }
        }
    }

    public function updateEtapeMetadatas($metas, $types, $requireds, $etape_id)
    {
        $metadonnees_existant = EtapeMetadonnee::where('etape_id', $etape_id)->pluck('libelle')->toArray();
        $i = 0;
        foreach ($metas as $meta) {
            if (!in_array($meta, $metadonnees_existant)) {
                $field_name = Utility::epurationName($meta);
                EtapeMetadonnee::create(['etape_id' => $etape_id, 'libelle' => $meta, 'field_name' => $field_name, 'type_donnee' => $types[$i], 'obligatoire' => $requireds[$i]]);
            }
            $i++;
        }
        foreach ($metadonnees_existant as $existingMeta) {
            if (!in_array($existingMeta, $metas)) {
                EtapeMetadonnee::where('etape_id', $etape_id)->where('libelle', $existingMeta)->delete();
            }
        }
    }

    public function deleteEtape($id)
    {
        $this->view = config('master.app.view.backend') . '.etape';
        $data = Etape::find($id);
        return view($this->view . '.delete', compact('data'));
    }

    public function destroyEtape(Request $request)
    {
        $data = Etape::find($request->idEtape);
        if ($data->delete()) {
            $response = ['status' => TRUE, 'message' => 'Données supprimées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Echec de la suppresion des donnée']);
    }

}
