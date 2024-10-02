<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores=[
            0 => [
                'nome' => 'Gabriel',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '11',
                'telefone' => '993388910'
            ],

            1 => [
                'nome' => 'Giulia',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '61',
                'telefone' => '983145910'
            ]
        ];
        
        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
