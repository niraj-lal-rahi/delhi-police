<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersData extends Model
{
    //
    protected $fillable = ['s_no','case_number','order_date','link','site_id','court_order_id'];

}
