<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentEtapeUpload extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','document_etape_id','processus_engage_id','titre','url'];
    protected $casts = [];
    protected $table = 'document_etape_uploads';

	public function document_etape()
	{
		return $this->belongsTo(DocumentEtape::class, 'document_etape_id');
	}
	public function processus_engage()
	{
		return $this->belongsTo(ProcessusEngage::class);
	}
}
