<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Table;

class Reservation extends Model
{
    protected $fillable = ['guest_name','number_of_persons','status'];

    public function table()
    {
    	return $this->belongsTo(Table::class);
    }
}
