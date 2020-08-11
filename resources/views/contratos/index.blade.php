@extends('index')
@section('content')

@if ($msg != '')
    <div class="alert alert-primary" role="alert" style="width: 50rem; height: 7rem;">
        {{ $msg }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card-header" style="padding: 1rem;">
    <h4 class="card-body">Contratos</h4>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{$disabled}}">
                <a class="page-link" href="{{ url("/contratos/".--$pagina."/pagina") }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item disabled"><a class="page-link" href="#">{{++$pagina}}</a></li>
            <li class="page-item">
                <a class="page-link" href="{{ url("/contratos/".++$pagina."/pagina") }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col"># Contrato</th>
            <th scope="col">Proprietário</th>
            <th scope="col">Inquilino</th>
            <th scope="col">Data Início</th>
            <th scope="col">Data Final</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

    @foreach ($contratos->data as $contrato)
        <tr>
            <td>{{ $contrato->id_contrato_con }}</td>
            <td>{{ $contrato->nome_proprietario }}</td>
            <td>
                @foreach ($contrato->inquilinos as $inquilino)
                {{ $inquilino->st_nomeinquilino }}<br />
                @endforeach
            </td>
            <td>{{ $contrato->dt_inicio_con }} </td>
            <td> {{ $contrato->dt_fim_con }}</td>
            <th scope="row">
                <a href="{{ url("/contratos/".$contrato->id_contrato_con."/editar") }}" class="btn btn-xs btn-primary btn-action">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
            <a href="#" onclick="window.open('{{ url("/despesas/".$contrato->id_contrato_con."/contrato") }}','Despesas do Contrato {{$contrato->id_contrato_con}}','width=700,height=400');" class="btn btn-xs btn-info btn-action">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                    </svg>
                </a>
            </th>
        </tr>


    @endforeach
    </tbody>
</table>
@endsection
