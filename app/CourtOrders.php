<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourtOrders extends Model
{
    //

    protected $fillable = ['url', 'court_type','court_complex','from_date','to_date','data','site_id','filter_status'];


    public function dataCollection(){
        return $this->hasMany(\App\OrdersData::class,'court_order_id','id');
    }
}
