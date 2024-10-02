<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    // métodos/actions
    public function principal()
    {
        return view('site.principal',['titulo' => 'Home']); 
        //referencia ao path site/principal.blade.php 
    }
}
