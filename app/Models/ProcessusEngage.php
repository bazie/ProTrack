<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessusEngage extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = ['id', 'type_entite', 'entite_id', 'processus_id', 'description', 'initiate_by', 'etape_id', 'etat'];
	protected $casts = [];
	protected $table = 'processus_engages';


	public function processus()
	{
		return $this->belongsTo(Processus::class);
	}
	public function etape()
	{
		return $this->belongsTo(Etape::class);
	}

	public function initiate_by_user()
	{
		return $this->belongsTo(User::class, 'initiate_by');
	}

	public function projet()
	{
		return $this->belongsTo(Projet::class, 'entite_id');
	}

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'entite_id');
	}

	public function getEntiteAttribute()
	{
		if ($this->type_entite === 'projet' && $this->projet) {
			return 'Projet : ' . $this->projet->short_name;
		} elseif ($this->type_entite === 'departement' && $this->departement) {
			return 'Département : ' . $this->departement->dep_name;
		}
		return null;
	}
}
