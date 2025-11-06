<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembresProjet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'projet_id', 'user_id'];
    protected $casts = [];
    protected $table = 'membres_projets';


    public function user(): object
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projet(): object
    {
        return $this->belongsTo(Projet::class, 'projet_id');
    }

}
