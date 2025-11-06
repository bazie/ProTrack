<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\AccessGroup;
use App\Models\Level;
use App\Models\Office;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view($this->view.'.index');
    }

    public function create()
    {
        $level = Level::filterLevel()->pluck('name', 'id');
        $access_group = AccessGroup::filterLevel()->pluck('name', 'id');
        $offices= Office::all()->pluck('office_name', 'id_office');
        return view($this->view.'.create', compact('level', 'access_group','offices' ));
    }

    public function data(Request $request)
    {
        $data = $this->model::filterLevel()->with('level', 'access_group', 'office');
        $user = $request->user();
        return datatables()->of($data)
            ->filterColumn('name',function($query,$keyword){
                $sql = "CONCAT(first_name,' ',last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->update){
                    $button.='<button class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
                }
                if($user->delete){
                    $button.='<button class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>".$button."</div>";
            })
            ->editColumn('statu', function ($data) {
                $statu='';
                if($data->statu==0)
                    $statu='<span class="badge badge-gray disabled">Désactivé</span> ';
                if($data->statu==1)
                    $statu= '<span class="badge badge-success">Activé</span> ';
                return $statu;
            })
            ->addIndexColumn()
            ->rawColumns(['action','statu'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'nullable|min:3',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'level_id' => 'required|exists:levels,id',
            'access_group_id' => 'required|exists:access_groups,id',
        ]);
        if ($this->model::create($request->all())) {
            $response = ['status' => TRUE, 'message' => 'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être enregistrées']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = $this->model::findOrFail($id);
        $level = Level::filterLevel()->pluck('name', 'id');
        $access_group = AccessGroup::filterLevel()->pluck('name', 'id');
        $offices= Office::all()->pluck('office_name', 'id_office');
        return view($this->view.'.edit', compact('data', 'level', 'access_group','offices'));
    }

    public function update(Request $request, $id)
    {
        $is_required = $request->password ? 'required' : 'nullable';
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'nullable|min:3',
            'level_id' => 'nullable|exists:levels,id',
            'access_group_id' => 'nullable|exists:access_groups,id',
            'email' => 'required|email|unique:users,email,'.$id.',id,deleted_at,NULL',
            'password' => $is_required.'|min:8|confirmed',
            'password_confirmation' => $is_required.'|min:8|same:password',
        ]);

        $data = $this->model::find($id);
        if ($data->update($request->all())) {
            $response = ['status' => TRUE, 'message' => 'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status' => FALSE, 'message' => 'Les données n\'ont pas pu être enregistrées']);
    }

    public function delete($id)
    {
        $data=$this->model::find($id);
        return view($this->view.'.delete', compact('data'));
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if($data->delete()){
            $response=['status'=>TRUE, 'message'=>'Données supprimées avec succès'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Echec de la supprions des données']);
    }
}
