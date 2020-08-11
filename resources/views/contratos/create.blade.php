@extends('index')
@section('content')

<div class="py-4"></div>

    <div class="card-header" style="padding: 1rem;">
        <h4 class="card-body">Cadastrar Contrato</h4>
    </div>

    <div class="card">

        <div style="padding: 1rem;">
            <form action="{{url('/contratos/store')}}" method="POST">

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
                    <label for="id_tipo_con" class="control-label">Tipo Contrato</label>
                    <select name="id_tipo_con" class="form-control">
                        <option value="">Selecione um tipo</option>
                        @foreach ($tipos_contrato as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_inicio_con" class="control-label">Data de Início do Contrato</label>
                    <input type="text" name="dt_inicio_con" id="data_inicio" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />
                </div>
                <div class="form-group">
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
                    <select name="nm_diavencimento_con" class="form-control" style="width: 15rem;">
                        @foreach ($diasMes as $dia)
                            <option value="{{ $dia }}">{{ $dia }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="inquilinos" class="control-label">Inquilino</label>
                    <select name="inquilinos" class="form-control">
                        <option value="">Selecione um Inquilino</option>
                        @foreach ($inquilinos->data as $inquilino)
                            <option value="{{ $inquilino->id_pessoa_pes }}">{{ $inquilino->st_nome_pes }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tx_locacao_con" class="control-label">Taxa de Locação</label>
                    <input type="text" name="tx_locacao_con" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="id_indicereajuste_con" class="control-label">Indice  de Reajuste</label>
                    <input type="text" name="id_indicereajuste_con" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="nm_mesreajuste_con" class="control-label">Mês Reajuste</label>
                    <select name="nm_mesreajuste_con" class="form-control" style="width: 15rem;">
                        @foreach ($mes as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_ultimoreajuste_con" class="control-label">Data de Último Reajuste</label>
                    <input type="text" name="dt_ultimoreajuste_con" id="dt_ultimoreajuste_con" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="fl_mesfechado_con" class="control-label">flag mes fechado</label>
                    <input type="text" name="fl_mesfechado_con" class="form-control" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="id_contabanco_cb" class="control-label">ID Banco</label>
                    <input type="text" name="id_contabanco_cb" class="form-control" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="fl_diafixorepasse_con" class="control-label">Dia Fixo Repasse</label>
                    <select name="fl_diafixorepasse_con" class="form-control" style="width: 30rem;">
                        <option value="">Selecione uma opção</option>
                        @foreach ($flagDiaFixoRepasse as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    <select name="nm_diarepasse_con" class="form-control" style="width: 15rem;">
                        @foreach ($diasMes as $dia)
                            <option value="{{ $dia }}">{{ $dia }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fl_mesvencido_con" class="control-label">Mês Vencido</label>
                    <select name="fl_mesvencido_con" class="form-control" style="width: 15rem;">
                        @foreach ($flagMesVencido as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="st_observacao_con" class="control-label">Observação</label>
                    <input type="text" name="st_observacao_con" class="form-control" placeholder="Observação" style="width: 100%;" />
                </div>

                <div class="form-group">
                    <label for="fl_endcobranca_con" class="control-label">Mês Vencido</label>
                    <select name="fl_endcobranca_con" class="form-control" style="width: 15rem;">
                        @foreach ($flagEnderecoCobranca as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $("#data_inicio, #data_final, #dt_ultimoreajuste_con").mask("00/00/0000");

    </script>

@endsection
