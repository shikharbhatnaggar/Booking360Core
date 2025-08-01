<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Reservation;
use App\Models\WaitingList;

class Table extends Model
{
    protected $fillable = ['name','seats','status'];

    public function reservation()
    {
    	return $this->hasOne(Reservation::class);
    }

    public function free()
    {

    	$activeReservation = $this->reservation()->where('status','Booked')->first();

    	if( $activeReservation )
    	{
    		$activeReservation->status = 'Completed';
    		$activeReservation->save();
    	}

    	$this->status = 'Available';
    	$this->save();

    	$waitingGuest = WaitingList::where('number_of_persons', '<=', $this->seats)->orderBy('created_at', 'asc')->first();

    	if ($waitingGuest)
    	{
    		$reservation = new Reservation();
    		$reservation->guest_name = $waitingGuest->guest_name;
    		$reservation->number_of_persons = $waitingGuest->number_of_persons;
    		$reservation->table_id = $this->id;
    		$reservation->status = 'Booked';
    		$reservation->save();

    		$this->status = 'Booked';
    		$this->save();

    		$waitingGuest->delete();
    	}
    }
}
