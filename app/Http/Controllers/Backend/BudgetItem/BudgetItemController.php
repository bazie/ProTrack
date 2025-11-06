<?php

namespace App\Http\Controllers\Backend\BudgetItem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudgetItemController extends Controller
{
    public function index()
    {
        return view($this->view.'.index');
    }

    public function create()
    {
        return view($this->view.'.create');
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data = $this->model::with('categorie_approvisionnement');
        return datatables()->of($data)
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->read){
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Tampilkan"><i class="fa fa-eye text-info"></i></button>';
                }
                if($user->update){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
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
            'location' => 'required',
			'activity_description' => 'required',
			'categorie_approvisionnement_id' => 'required|exists:categorie_approvisionnements,id',
			'sap_output_code' => 'required',
			'cost_centre' => 'required',
			'gl_account' => 'required',
			'grant' => 'required',
			'fund' => 'required',
			'number_of_unit' => 'required',
			'unit_of_measure' => 'required',
			'unit_cost' => 'required',
			'quantity' => 'required',
        ]);

        if ($this->model::create($request->all())) {
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
        $data = $this->model::find($id);
        return view($this->view.'.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required',
			'activity_description' => 'required',
			'categorie_approvisionnement_id' => 'required|exists:categorie_approvisionnements,id',
			'sap_output_code' => 'required',
			'cost_centre' => 'required',
			'gl_account' => 'required',
			'grant' => 'required',
			'fund' => 'required',
			'number_of_unit' => 'required',
			'unit_of_measure' => 'required',
			'unit_cost' => 'required',
			'quantity' => 'required',
        ]);

        $data=$this->model::find($id);
        if($data->update($request->all())){
            $response=[ 'status'=>TRUE, 'message'=>'Données enregistrées avec succès'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Les données n\'ont pas pu être enregistrées']);
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
