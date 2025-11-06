<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = ['id', 'annee_fiscale_id', 'responsable_budget_id', 'responsable_budget_nom', 'type_entite', 'projet_id', 'departement_id', 'statut'];
	protected $casts = [];
	protected $table = 'budgets';

	public function annee_fiscale()
	{
		return $this->belongsTo(AnneeFiscale::class);
	}
	public function projet()
	{
		return $this->belongsTo(Projet::class);
	}
	public function departement()
	{
		return $this->belongsTo(Departement::class);
	}
	public function budgetItems()
	{
		return $this->hasMany(BudgetItem::class);
	}
}
