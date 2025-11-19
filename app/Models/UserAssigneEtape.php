<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAssigneEtape extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','user_id','processus_engage_id','assignate_by','etape_id','date_assignation','approbation','date_approbation','commentaire'];
    protected $casts = [];
    protected $table = 'user_assigne_etapes';

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function processus_engage()
	{
		return $this->belongsTo(ProcessusEngage::class);
	}
	public function etape()
	{
		return $this->belongsTo(Etape::class);
	}
}
