<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class masiyaController extends Controller
{
	
	public function ParsingData(){
		$file=asset('resources/assets/data.xml');
		$xml=simplexml_load_file($file);
		$array = json_decode(json_encode((array) $xml), 1);
		$array = array($xml->getName() => $array);	
		
		$arr=array("array"=>$array);	
	    return View('masiya', $arr);
	}

}
