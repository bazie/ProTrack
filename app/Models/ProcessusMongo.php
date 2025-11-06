<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model; // Utilise le bon Model MongoDB
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessusMongo extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';
    protected $guarded = [];


}
