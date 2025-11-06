<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','code','full_name','short_name','donor_id','national_organisation_id','country_office','start_date','grant_end_date','project_end_date','gik','tracking_fad','name_framework','approved_country_cost_ratio','direct_cost','apportioned_cost','no_cost_in_co_buget','id_manager','manager_name','manager_email','directory'];
    protected $casts = [];
    protected $table = 'projets';

    protected $primaryKey = 'id';

    public function donor(): object
    {
        return $this->belongsTo(Donor::class,'donor_id');
    }
    public function national_organisation(): object
    {
        return $this->belongsTo(NationalOrganisation::class,'national_organisation_id');
    }

    public function membresProjet(): object
    {
        return $this->hasMany(MembresProjet::class,'projet_id');
    }


}
