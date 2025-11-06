<?php

namespace App\Http\Controllers\Backend\Projet;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\MembresProjet;
use App\Models\NationalOrganisation;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjetController extends Controller
{
    public function index()
    {

        return view($this->view.'.index');
    }

    public function create()
    {
        $users= User::where('statu','=',1)
                    ->selectRaw("CONCAT(first_name, ' ', last_name,'<',email,'>') AS full_name, id as user_id")
                    ->pluck('full_name' , 'user_id');
        $donors= Donor::all()->pluck('name' , 'id');
        $NOs= NationalOrganisation::all()->pluck('name' , 'id');
        
        return view($this->view.'.create',compact('users','donors','NOs'));
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data=$this->model::with('donor', 'national_organisation');
        return datatables()->of($data)
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->read){
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Voir"><i class="fa fa-eye text-info"></i></button>';
                }
                if($user->update){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
                    $button.='<button type="button" class="btn-members btn btn-sm btn-outline" data-id="'.$data->id.'" title="Membres"> <i class="fa fa-users text-primary"></i> </button> ';

                }
                if($user->delete){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>".$button."</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
			'full_name' => 'required',
			'short_name' => 'required',
			'donor_id' => 'required',
			'national_organisation_id' => 'required',
			'start_date' => 'required',
			'grant_end_date' => 'required',
			'gik' => 'required',
			'tracking_fad' => 'required',
			'name_framework' => 'required',
			'approved_country_cost_ratio' => 'required',
			'direct_cost' => 'required',
			'apportioned_cost' => 'required',
			'no_cost_in_co_buget' => 'required',
			'id_manager' => 'required',
        ]);

        $manager = User::find($request->id_manager);
        $req_data = array_merge($request->all(), [
            'manager_name' => $manager->first_name . ' ' . $manager->last_name,
            'manager_email' => $manager->email,
            'country_office'=>'PLAN INT BFA'
        ]);

        if ($this->model::create($req_data)) {
            $response=[ 'status'=>TRUE, 'message'=>'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Les données n\'ont pas pu être enregistrées']);
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return view($this->view.'.show', compact('data'));
    }

    public function edit($id)
    {
        $users= User::where('statu','=',1)
                    ->selectRaw("CONCAT(first_name, ' ', last_name,'<',email,'>') AS full_name, id as user_id")
                    ->pluck('full_name' , 'user_id');
        $donors= Donor::all()->pluck('name' , 'id');
        $NOs= NationalOrganisation::all()->pluck('name' , 'id');
        $data = $this->model::find($id);
        return view($this->view.'.edit', compact('data','users','donors','NOs'));
    }

   


    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
			'full_name' => 'required',
			'short_name' => 'required',
			'donor_id' => 'required',
			'national_organisation_id' => 'required',
			'start_date' => 'required',
			'grant_end_date' => 'required',
			'gik' => 'required',
			'tracking_fad' => 'required',
			'name_framework' => 'required',
			'approved_country_cost_ratio' => 'required',
			'direct_cost' => 'required',
			'apportioned_cost' => 'required',
			'no_cost_in_co_buget' => 'required',
			'id_manager' => 'required',
        ]);
        $manager = User::find($request->id_manager);
        $req_data = array_merge($request->all(), [
            'manager_name' => $manager->first_name . ' ' . $manager->last_name,
            'manager_email' => $manager->email,
            'country_office'=>'PLAN INT BFA'
        ]);

        $data=$this->model::find($id);
        if($data->update($req_data)){
            $response=[ 'status'=>TRUE, 'message'=>'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Les données n\'ont pas pu être enregistrées']);
    }

    public function membres(Request $request, $id){
        $projet = Projet::find($id);
        return view($this->view.'.members', compact('projet'));
    }

    



    public function ajouterMembre($id){

    }

    public function supprimerMembre($id){

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
            $response=[ 'status'=>TRUE, 'message'=>'Données supprimées avec succès'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Echec de la supprions des données']);
    }
}
