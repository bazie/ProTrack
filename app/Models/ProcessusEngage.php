<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessusEngage extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','type_entite','entite_id','processus_id','description','initiate_by','etape_id','etat'];
    protected $casts = [];
    protected $table = 'processus_engages';

	public function projet()
	{
		return $this->belongsTo(Projet::class);
	}
	public function departement()
	{
		return $this->belongsTo(Departement::class);
	}
	public function processus()
	{
		return $this->belongsTo(Processus::class);
	}
	public function etape()
	{
		return $this->belongsTo(Etape::class);
	}
}
