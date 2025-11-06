<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentEtape extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','etape_id','type_document_id'];
    protected $casts = [];
    protected $table = 'document_etapes';

	public function etape()
	{
		return $this->belongsTo(Etape::class);
	}
	public function TypeDocument()
	{
		return $this->belongsTo(TypeDocument::class);
	}
}
