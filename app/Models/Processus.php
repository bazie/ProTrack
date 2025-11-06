<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Processus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','lib_processus','collection_name','description'];
    protected $casts = [];
    protected $table = 'processuses';

    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }

}
