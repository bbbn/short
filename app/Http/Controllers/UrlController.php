<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Url;
//use App\User;

class UrlController extends Controller
{
    public function add(Request $request)
    {
    	// url()->create([
     //        'url' => $request->name,
     //    ]);
    	$x=new Url;
    	// $x->url=$request->name;
    	// $x->hash=$request->name;
    	// $x->save();
         $t=$x->getShort($request->name);
    	//$x=new Url();
        //$x->getShort($request->name);
    	//return ((string)$x->getShort($request->name)->url);
    	 return ($t);
    }

    public function redirect($id)
    {
    	
        $x=new Url();

        if($x->redirect($id))
        {
            return redirect($x->redirect($id));
        }
        else
        {
            return view("welcome",[
                        'err'=>1]);
        }
    	 //return redirect('http://ya.ru');
    }
}
