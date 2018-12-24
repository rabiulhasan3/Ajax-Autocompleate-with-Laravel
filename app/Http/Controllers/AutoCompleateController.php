<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutoCompleateController extends Controller
{
   public function index(){
   	return view('autocompleate');
   }

   public function search_country(Request $request){
   		$country_name = $request->country_name;
   		if ($country_name) {
   			$data = DB::table('country')->where('country_name', 'LIKE', '%'.$country_name.'%')->get();
   			$output = '<ul class="dropdown-menu" style="display: block; position: relative;">';
   			foreach ($data as $key => $row) {
   				$output.='<li class="px-3" id="single_country">'.$row->country_name.'</li>';
   			}
   			$output.= '</ul>';
   			echo $output;
   		}
   		   	

   }

}
// where('country_name', 'LIKE', '%'.$country_name.'%')
