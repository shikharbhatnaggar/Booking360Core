<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Table;
use App\Models\Reservation;
use App\Models\WaitingList;

class ReservationController extends Controller
{
    public function create()
    {
    	return view('reserve');
    }

    public function store(Request $request)
    {
    	// dd($request);
    	$validated = $request->validate([
    		'guest_name' => 'required|string|max:100',
    		'number_of_persons' => 'required|integer|min:1|max:10',
    	]);

    	if($validated['number_of_persons'] > 8)
    	{
    		return back()->withErrors(["Maximum seating capacity of any table is 8."]);
    	}

    	$table = Table::where('status', 'Available')->where('seats', '>=', $validated['number_of_persons'])->orderBy('seats')->first();

    	if ($table)
    	{
    		$reservation = new Reservation();
    		$reservation->guest_name = $validated['guest_name'];
    		$reservation->number_of_persons = $validated['number_of_persons'];
    		$reservation->table_id = $table->id;
    		$reservation->status = 'Booked';
    		$reservation->save();

    		$table->status = 'Booked';
    		$table->save();

    		return back()->with("success", "Table reserved successfully.");

    	}
    	else{

    		WaitingList::create([
    			'guest_name' => $validated['guest_name'],
    			'number_of_persons' => $validated['number_of_persons'],
    			'status' => 'Waiting'
    		]);

			return back()->with("success", "No table available. You are added to the waiting list.");    		
    	}


    }

    public function waitingList()
    {
    	$waitingList = WaitingList::orderBy('created_at', 'asc')->get();
    	// dd($tables);
    	return view('waitinglist', compact('waitingList'));
    }

}
