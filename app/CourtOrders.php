<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourtOrders extends Model
{
    //

    protected $fillable = ['url', 'court_type','court_complex','from_date','to_date','data'];
}
