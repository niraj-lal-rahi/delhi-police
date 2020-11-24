<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    //
    protected $fillable = ['url', 'court_type','court_complex','year','status','case_type','scrap_status'];
    
}
