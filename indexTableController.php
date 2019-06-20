<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Lead;

use DB;
use Illuminate\Support\Facades\Auth;

class indexTableController extends Controller
{
    public function index()
	{
		$leadsTable1 = Lead::with('phone')->join('open_leads', 'open_leads.lead_id', '=', 'leads.id')->get();
		return view('table')->with('leadsTable', $leadsTable1);
	}
	public function tableajax(Request $request)
	{
		$id = $request->input('id');
		$lebel = DB::table('sphere_attributes')->where('sphere_id', '=', $id)->get();
		$vallabel = DB::table('sphere_attribute_options')
		->join('sphere_attributes', 'sphere_attributes.id', '=', 'sphere_attribute_options.sphere_attr_id')
		->where('sphere_attribute_options.ctype', '=', 'agent')->get();
	}
}
