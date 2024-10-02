<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //sequencia dos parâmetros é a mesma
    public function teste(int $p1,int $p2){ //recebendo parâmetros passados na rota
        
        //Passando parâmetros pra view:
        //Opção 1: (Array Associativo)
        //return view('site.teste',['p1'=> $p1,'p2'=>$p2]);

        //Opção 2: (Compact())
        //return view('site.teste',compact('p1','p2'));

        //Opção 3: (With())
        return view('site.teste')->with('p1',$p1)->with('p2',$p2);
    }
}
 