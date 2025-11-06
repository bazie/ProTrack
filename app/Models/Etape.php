<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etape extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','processus_id','nom_etape','delai','ordre','level_id'];
    protected $casts = [];
    protected $table = 'etapes';

	public function processus()
	{
		return $this->belongsTo(Processus::class);
	}

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function DocumentEtape()
    {
        return $this->hasMany(DocumentEtape::class, 'etape_id');
    }

    public function Metadonnees()       
    {
        return $this->hasMany(EtapeMetadonnee::class, 'etape_id');  
    }
    public function scopeSort($query) : object
    {
        return $query->orderBy('ordre', 'asc');
    }

}
