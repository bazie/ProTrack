<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id_office','office_name'];
    protected $casts = [];
    protected $table = 'offices';

    protected $primaryKey = 'id_office';

    public function users(): object
    {
        return $this->hasMany(User::class);
    }

}
