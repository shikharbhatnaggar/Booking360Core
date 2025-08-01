<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  		// 4 tables with 2 seats each
		// 4 tables with 4 seats each
		// 2 tables with 8 seats each

    	Table::insert([

    		['name'=>'T1',	'seats'=>2,	'status'=>'Available'],
    		['name'=>'T2',	'seats'=>2,	'status'=>'Available'],
    		['name'=>'T3',	'seats'=>2,	'status'=>'Available'],
    		['name'=>'T4',	'seats'=>2,	'status'=>'Available'],

    		['name'=>'T5',	'seats'=>4,	'status'=>'Available'],
    		['name'=>'T6',	'seats'=>4,	'status'=>'Available'],
    		['name'=>'T7',	'seats'=>4,	'status'=>'Available'],
    		['name'=>'T8',	'seats'=>4,	'status'=>'Available'],

    		['name'=>'T9',	'seats'=>8,	'status'=>'Available'],
    		['name'=>'T10',	'seats'=>8,	'status'=>'Available']


    	]);
    }
}
