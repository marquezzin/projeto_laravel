<h3>Fornecedores</h3>

@php

@endphp

{{-- sintaxe do blade pra imprimir array --}}


@isset($fornecedores) 
    {{-- indice é cada elemento do array, no caso do elemento
    sendo uma chave, da pra acessar o valor com '=>' --}}
    @forelse ($fornecedores as $indice => $fornecedor)
        Iteração atual: {{$loop->iteration}}
        <br>
        Fornecedor:  {{$fornecedor['nome']}} 
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone {{$fornecedor['ddd'] ?? '' }} {{$fornecedor['telefone'] ?? '' }}
        <br>
    @if ($loop->first)
        Primeira iteração do loop 
        <br>  
    @endif
    @if ($loop->last)
        Ultima iteração do loop 
        <br>  
        Total de Registros: {{$loop->count}}
    @endif
    <hr>
    @empty
        Não existe fornecedores cadastrados!!!
    @endforelse    
@endisset
<br>



