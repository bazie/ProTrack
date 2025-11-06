<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorieApprovisionnement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','categorie_lib'];
    protected $casts = [];
    protected $table = 'categorie_approvisionnements';

}
