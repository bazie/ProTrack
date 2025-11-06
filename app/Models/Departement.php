<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','dep_name','id_manager','manager_name','manager_email'];
    protected $casts = [];
    protected $table = 'departements';

    protected $primaryKey = 'id';

    public function membresDepartement(): object
    {
        return $this->hasMany(MembresDepartement::class,'departement_id');
    }

    public function getNomeAttribute()
    {
        return $this->dep_name;
    }

}
