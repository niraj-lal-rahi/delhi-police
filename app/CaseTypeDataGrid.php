<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseTypeDataGrid extends Model
{
    //

    public function acts(){
        return $this->hasMany(\App\CaseTypeActSection::class,'case_type_data_grids_id','id');
    }
}
