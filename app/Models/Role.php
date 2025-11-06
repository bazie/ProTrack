<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','module_id','lib_role,code_role'];
    protected $casts = [];
    protected $table = 'roles';

	public function module()
	{
		return $this->belongsTo(Module::class);
	}
}
