<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetPhasingCheck extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','budget_item_id','month','amount'];
    protected $casts = [];
    protected $table = 'budget_phasing_checks';

	public function budget_item()
	{
		return $this->belongsTo(BudgetItem::class);
	}
}
