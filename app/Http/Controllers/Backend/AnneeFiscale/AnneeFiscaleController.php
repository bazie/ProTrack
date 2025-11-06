<?php

namespace App\Http\Controllers\Backend\AnneeFiscale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnneeFiscaleController extends Controller
{
    public function index()
    {
        $canAdd = !($this->model::where('statut', 'Planification')->exists());
        return view($this->view . '.index', compact('canAdd'));
    }

    public function create()
    {

        $annee = date('Y');
        $date_debut = $annee . '-07-01';
        $date_fin = ($annee + 1) . '-06-30';
        $libelle = 'FY' . ($annee - 2000 + 1);
        return view($this->view . '.create', compact('date_debut', 'date_fin', 'libelle'));
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data = $this->model::all();
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

    public function store(Request $request)
    {
        if ($existe = $this->model::where('statut', 'Planification')->exists()) {
            $response = ['status' => FALSE, 'message' => 'Il existe deja une annee fiscale en planification'];
            return response()->json($response);
        }
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'statut' => 'required',
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
            'libelle' => 'required',
            'description' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'statut' => 'required',
        ]);
        if ($existe = $this->model::where('statut', 'Planification')->where('id', '!=', $id)->exists() && $request->statut == 'Planification') {
            $response = ['status' => FALSE, 'message' => 'Il existe deja une annee fiscale en planification'];
            return response()->json($response);
        }
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
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Echec de la supprions des données']);
    }
}
