@extends('index')
@section('content')
<div class="py-4"></div>

@if ($msg != '')
    <div class="alert alert-primary" role="alert" style="width: 30rem; height: 7rem;">
        {{ $msg }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card-header" style="padding: 1rem;">
    <h4 class="card-body">Imóveis</h4>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{$disabled}}">
                <a class="page-link" href="{{ url("/imoveis/".--$pagina."/pagina") }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item disabled"><a class="page-link" href="#">{{++$pagina}}</a></li>
            <li class="page-item">
                <a class="page-link" href="{{ url("/imoveis/".++$pagina."/pagina") }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Proprietários</th>
            <th scope="col">Endereço Imóvel</th>
            <th scope="col">Cidade</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

    @foreach ($imoveis->data as $imovel)
        <tr>
            <td>
                @foreach ($imovel->proprietarios_beneficiarios as $proprietario)
                    {{ $proprietario->st_nome_pes }} <br />
                @endforeach
            </td>
            <td>{{ $imovel->st_endereco_imo.", ".$imovel->st_numero_imo.", ".$imovel->st_complemento_imo }}</td>
            <td>{{ $imovel->st_cidade_imo."/".$imovel->st_estado_imo }}</td>
            <th scope="row">
                <a href="{{ url("/imoveis/".$imovel->id_imovel_imo."/editar") }}" class="btn btn-xs btn-primary btn-action">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
            </th>
        </tr>


    @endforeach
    </tbody>
</table>
@endsection
