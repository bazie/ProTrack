<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = ['id','user_id','role_id'];
    protected $casts = [];
    protected $table = 'user_roles';

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
