<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAssigneEtape extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = ['id', 'user_id', 'processus_engage_id', 'assignate_by', 'etape_id', 'date_assignation', 'approbation', 'date_approbation', 'commentaire'];
	protected $casts = [];
	protected $table = 'user_assigne_etapes';

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function processusEngage()
	{
		return $this->belongsTo(ProcessusEngage::class);
	}
	public function etape()
	{
		return $this->belongsTo(Etape::class);
	}

	public function assignedUser()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function assignedByUser()
	{
		return $this->belongsTo(User::class, 'assignate_by');
	}

}
