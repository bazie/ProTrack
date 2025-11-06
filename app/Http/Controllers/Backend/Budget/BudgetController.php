<?php

namespace App\Http\Controllers\Backend\Budget;

use App\Http\Controllers\Controller;
use App\Models\AnneeFiscale;
use App\Models\Departement;
use App\Models\MembresDepartement;
use App\Models\MembresProjet;
use App\Models\Projet;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        return view($this->view . '.index');
    }

    public function create()
    {
        $anneesFiscale = AnneeFiscale::where('statut', 'Planification')->pluck('libelle', 'id');
        $projets = $this->projetsManager(request());
        $departements = $this->departementsManager(request());
        return view($this->view . '.create', compact('anneesFiscale', 'projets', 'departements'));
    }

    public function data(Request $request)
    {
        $user = $request->user();

        // IDs des départements où l'utilisateur est membre
        $departementIds = MembresDepartement::where('user_id', $user->id)->pluck('departement_id')->toArray();
        // IDs des départements où l'utilisateur est manager
        $managerDepartementIds = Departement::where('id_manager', $user->id)->pluck('id')->toArray();
        $departementIds = array_unique(array_merge($departementIds, $managerDepartementIds));

        // IDs des projets où l'utilisateur est membre
        $projetIds = MembresProjet::where('user_id', $user->id)->pluck('projet_id')->toArray();
        // IDs des projets où l'utilisateur est manager
        $managerProjetIds = Projet::where('id_manager', $user->id)->pluck('id')->toArray();
        $projetIds = array_unique(array_merge($projetIds, $managerProjetIds));

        $data = $this->model::with(['departement', 'projet', 'budgetItems'])
            ->where(function ($query) use ($departementIds, $projetIds) {
                $query->whereIn('departement_id', $departementIds)
                    ->orWhereIn('projet_id', $projetIds);
            })
            ->get()
            ->map(function ($item) {
                // Définir le nom de l'entité (département ou projet)
                $item->entite_nom = $item->departement_id ? ($item->departement->dep_name ?? '') : ($item->projet->short_name ?? '');
                // Libellé de l'année fiscale
                $item->annee_fiscale_libelle = $item->annee_fiscale->libelle ?? '';
                // Calcul du montant total du budget
                $item->montant_budget = $item->budgetItems->sum(function ($budgetItem) {
                    return $budgetItem->quantity * $budgetItem->unit_cost;
                });
                return $item;
            });
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
            ->addColumn('montant_budget', function ($row) {
                return number_format($row->montant_budget, 2, ',', ' ') . ' XOF';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'annee_fiscale_id' => 'required|exists:annee_fiscales,id',
            'departement_id' => 'nullable|exists:departements,id',
            'projet_id' => 'nullable|exists:projets,id',
            'type_entite' => 'required|in:departement,projet',
        ]);
        if (
            $request->type_entite === 'departement' &&
            $this->model::where('annee_fiscale_id', $request->annee_fiscale_id)
                ->where('departement_id', $request->departement_id)
                ->exists()
        ) {
            return response()->json([
                'status' => FALSE,
                'message' => 'Un budget pour ce département et cette année fiscale existe déjà.'
            ]);
        }
        $data = $request->all();
        $data['statut'] = 'Edition';
        $data['responsable_budget_id'] = $user->id;
        $data['responsable_budget_nom'] = $user->first_name . ' ' . $user->last_name;

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

    public function projetsManager(Request $request)
    {
        $user = $request->user();
        $projets = Projet::where('id_manager', $user->id)->pluck('short_name', 'id');

        return $projets;
    }
    public function departementsManager(Request $request)
    {
        $user = $request->user();
        $departements = Departement::where('id_manager', $user->id)->pluck('dep_name', 'id');

        return $departements;
    }
}
