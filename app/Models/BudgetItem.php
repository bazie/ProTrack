<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetItem extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','budget_id','location','activity_description','categorie_approvisionnement_id','sap_output_code','cost_centre','gl_account','grant','fund','number_of_unit','unit_of_measure','unit_cost','quantity'];
    protected $casts = [];
    protected $table = 'budget_items';

	public function budget()
	{
		return $this->belongsTo(Budget::class);
	}
	public function categorie_approvisionnement()
	{
		return $this->belongsTo(CategorieApprovisionnement::class);
	}
}
