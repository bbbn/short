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
       
        $url=new Url;
        return ($url->getShort($request->name));
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
            return view("welcome",['err'=>1]);
        }
    }
}
