<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnneeFiscale extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = ['id','libelle','description','date_debut','date_fin','statut'];
    protected $casts = [];
    protected $table = 'annee_fiscales';

}
