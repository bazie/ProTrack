<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtapeMetadonnee extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','etape_id','libelle','field_name','type_donnee','obligatoire'];
    protected $casts = [];
    protected $table = 'etape_metadonnees';

	public function etape()
	{
		return $this->belongsTo(Etape::class);
	}
}
