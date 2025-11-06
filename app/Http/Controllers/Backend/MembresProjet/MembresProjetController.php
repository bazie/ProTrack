<?php

namespace App\Http\Controllers\Backend\MembresProjet;

use App\Http\Controllers\Controller;
use App\Models\MembresProjet;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;

class MembresProjetController extends Controller
{
    public function index()
    {
        return view($this->view . '.index');
    }

    public function create()
    {
        $users = User::where('statu', '=', 1)
            ->selectRaw("CONCAT(first_name, ' ', last_name,'<',email,'>') AS full_name, id as user_id")
            ->pluck('full_name', 'user_id');
        $projets = Projet::all()->pluck('short_name', 'id');
        return view($this->view . '.create',compact('users','projets'));
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data = $this->model::with('projet', 'user');
        return datatables()->of($data)
            ->addColumn('action', function ($data) use ($user) {
                $button = '';
                if ($user->delete) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="' . $this->url . '" data-id="' . $data->id . '" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>" . $button . "</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function ProjectMembers(Request $request, $id_projet)
    {
        $current_user = $request->user();
        $projet = Projet::find($id_projet);
        $data = $this->model::with('user')
            ->where('projet_id', $id_projet)
            ->get()
            ->map(function ($data) use ($projet) {
                $data->Droit = $data->user_id == $projet->id_manager ? 'Manager' : 'Membre';
                return $data;
            })
            ->sortBy('Droit');
        return datatables()->collection($data)
            ->addColumn('action', function ($data) use ($current_user) {
                $button = '';

                if ($current_user->delete) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="' . $this->url . '" data-id="' . $data->id . '" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>" . $button . "</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function createProjectMember(Request $request, $id_projet)
    {
        return view($this->view . '.create_project_member', compact('id_projet'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $lsMembresDep = MembresProjet::where([
            ['projet_id', '=', $request->projet_id],
            ['user_id', '=', $request->user_id],
        ])->get();;
        if($lsMembresDep->isNotEmpty())
            return response()->json($response ?? ['status'=>FALSE, 'message'=>'L\'utilisateur séléction et déjà membre du projet']);

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
            'projet_id' => 'required|exists:projets,id',
            'user_id' => 'required|exists:users,id',
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
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Echec de la supprions des données']);
    }
}
