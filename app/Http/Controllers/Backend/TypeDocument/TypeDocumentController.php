<?php

namespace App\Http\Controllers\Backend\TypeDocument;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
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
        $request->validate([
            'titre_type' => 'required',
            'template' => 'required|file',
        ]);

        if ($request->hasFile('template')) {
            $file = $request->file('template');
            // Nettoyer le titre pour le nom de fichier
            $titre = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->titre_type);
            $datetime = date('Ymd_His');
            $extension = $file->getClientOriginalExtension();
            $filename = $titre . '_' . $datetime . '.' . $extension;
            $path = $file->storeAs('templates', $filename, 'public');
            $url = asset('storage/' . $path);
        } else {
            $url = null;
        }

        $data = $request->all();
        $data['template'] = $url;


        if ($this->model::create($data)) {
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
            'titre_type' => 'required',
            'template' => 'nullable|file', // Le fichier peut être optionnel à la modification
        ]);

        $data = $this->model::find($id);

        if ($request->hasFile('template')) {
            $file = $request->file('template');
            // Nettoyer le titre pour le nom de fichier
            $titre = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->titre_type);
            $datetime = date('Ymd_His');
            $extension = $file->getClientOriginalExtension();
            $filename = $titre . '_' . $datetime . '.' . $extension;
            $path = $file->storeAs('templates', $filename, 'public');
            $url = asset('storage/' . $path);
            $updateData = $request->all();
            $updateData['template'] = $url;
        } else {
            $updateData = $request->except('template');
        }

        if ($data->update($updateData)) {
            $response = ['status' => TRUE, 'message' => 'Données mises à jour avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être mises à jour']);
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
