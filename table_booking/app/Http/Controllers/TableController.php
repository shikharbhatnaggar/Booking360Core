<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Table;
use App\Models\Reservation;

class TableController extends Controller
{

    public function index()
    {
    	// $tables = Table::with('reservation')->get();
    	$tables = Table::with(['reservation' => function($query){
    		$query->where('status', 'Booked');
    	}])->get();
    	// dd($tables);
    	return view('index', compact('tables'));
    }

    public function freeTable($id)
    {
    	$table = Table::findOrFail($id);

    	if($table->status === 'Booked')
    	{

    		$table->free();

    		return back()->with("success", "Table free.");
    	}
    }
}
