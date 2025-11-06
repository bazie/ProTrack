<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembresDepartement extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = ['id','departement_id','user_id'];
    protected $casts = [];
    protected $table = 'membres_departements';


    public function departement(): object
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
    public function user(): object
    {
        return $this->belongsTo(User::class,'user_id');
    }

    

    


}
