<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Illuminate\Support\Facades\Auth;

class indexTableController extends Controller
{
    //
	public function index()
	{
		echo 'Index Controller, action index!!!';
		$leadsTable = DB::table('leads')
		->join('customers', function($join){
			$join->on('customers.id', '=', 'leads.customer_id');
		})
		->join('open_leads', function($join){
			$join->on('open_leads.lead_id', '=', 'leads.id');
		})
		->get();
		return view('table')->with('leadsTable', $leadsTable);
	}
	public function tableajax(Request $request)
	{
		$id = $request->input('id');
		$lebel = DB::table('sphere_attributes')->where('sphere_id', '=', $id)->get();
		$vallabel = DB::table('sphere_attribute_options')
		->join('sphere_attributes', function($join){
			$join->on('sphere_attributes.id', '=', 'sphere_attribute_options.sphere_attr_id');
		})
		->where('sphere_attribute_options.ctype', '=', 'agent')->get();
		return view('verticaltable')->with(['lebel' => $lebel, 'vallabel' => $vallabel]);
		
	}
}
