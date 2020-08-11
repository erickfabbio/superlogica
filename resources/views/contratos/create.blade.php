@extends('index')
@section('content')

<div class="py-4"></div>

    <div class="card-header" style="padding: 1rem;">
        <h4 class="card-body">Cadastrar Contrato</h4>
    </div>

    <div class="card">

        <div style="padding: 1rem;">
            <form action="{{url('/Ccontratos/store')}}" method="POST">

                {{csrf_field()}}
                <div class="form-group">
                    <label for="id_imovel_imo" class="control-label">Imóvel</label>
                    <select name="id_imovel_imo" class="form-control">
                        <option value="">Selecione um imóvel</option>
                        @foreach ($imoveis->data as $imovel)
                            <option value="{{ $imovel->id_imovel_imo }}">
                                {{ $imovel->st_endereco_imo.", ".$imovel->st_numero_imo.", ".$imovel->st_complemento_imo }}&nbsp;
                                {{ $imovel->st_cidade_imo."/".$imovel->st_estado_imo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_tipo_imo" class="control-label">Tipo Contrato</label>
                    <select name="st_tipo_imo" class="form-control">
                        <option value="">Selecione um tipo</option>
                        @foreach ($tipos_contrato as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_inicio_con" class="control-label">Data de Início do Contrato</label>
                    <input type="text" name="dt_inicio_con" id="data_inicio" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />

                    <label for="dt_fim_con" class="control-label">Data de Término do Contrato</label>
                    <input type="text" name="dt_fim_con" id="data_final" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="vl_aluguel_con" class="control-label">Valor Aluguel</label>
                    <input type="text" name="vl_aluguel_con" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="tx_adm_con" class="control-label">Taxa Administrativa</label>
                    <input type="text" name="tx_adm_con" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="fl_txadmvalorfixo_con" class="control-label">Taxa Valor Fixo</label>
                    <input type="text" name="fl_txadmvalorfixo_con" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="nm_diavencimento_con" class="control-label">Dia do Vencimento</label>
                    <input type="text" name="nm_diavencimento_con" class="form-control" placeholder="" style="width: 15rem;" />
                </div>

                <div class="form-group">
                    <label for="proprietarios_beneficiarios" class="control-label">Inquilino</label>
                    <select name="proprietarios_beneficiarios" class="form-control">
                        <option value="">Selecione um Inquilino</option>
                        @foreach ($inquilinos->data as $inquilino)
                            <option value="{{ $inquilino->id_pessoa_pes }}">{{ $inquilino->st_nome_pes }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $("#data_inicio, #data_final").mask("00/00/0000");

    </script>

@endsection
