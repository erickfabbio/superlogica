@extends('index')
@section('content')

<div class="py-4"></div>

    <div class="card-header" style="padding: 1rem;">
    <h4 class="card-body">Editar Contrato #{{ $contrato->id_contrato_con }}</h4>
    </div>

    <div class="card">

        <div style="padding: 1rem;">
            <form action="{{url('/contratos/update')}}" method="POST">

                {{csrf_field()}}
            <input type="hidden" name="id_contrato_con" value="{{ $contrato->id_contrato_con }}">
                <div class="form-group">

                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Imóvel</h4>
                        <hr>
                        {{ $contrato->st_endereco_imo.", ".$contrato->st_numero_imo.", ".$contrato->st_complemento_imo }}&nbsp;
                        {{ $contrato->st_cidade_imo."/".$contrato->st_estado_imo }}
                        <hr>
                        <h4 class="alert-heading">Inquilino</h4>
                        <hr>
                        @foreach ($contrato->inquilinos as $inquilino)
                        {{ $inquilino->st_nomeinquilino }}<br />
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_tipo_con" class="control-label">Tipo Contrato</label>
                    <select name="id_tipo_con" class="form-control">
                        <option value="">Selecione um tipo</option>
                        @foreach ($tipos_contrato as $key=>$value)
                            @if($key == $contrato->id_tipo_con)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}" >{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_inicio_con" class="control-label">Data de Início do Contrato</label>
                    <input type="text" name="dt_inicio_con" value="{{ $contrato->dt_inicio_con }}" id="data_inicio" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="dt_fim_con" class="control-label">Data de Término do Contrato</label>
                    <input type="text" name="dt_fim_con" id="data_final" value="{{ $contrato->dt_fim_con }}" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="vl_aluguel_con" class="control-label">Valor Aluguel</label>
                    <input type="text" name="vl_aluguel_con" value="{{ $contrato->vl_aluguel_con }}" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="tx_adm_con" class="control-label">Taxa Administrativa</label>
                    <input type="text" name="tx_adm_con" value="{{ $contrato->tx_adm_con }}" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="fl_txadmvalorfixo_con" class="control-label">Taxa Valor Fixo</label>
                    <input type="text" name="fl_txadmvalorfixo_con" value="{{ $contrato->fl_txadmvalorfixo_con }}" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="nm_diavencimento_con" class="control-label">Dia do Vencimento</label>
                    <select name="nm_diavencimento_con" class="form-control" style="width: 15rem;">
                        @foreach ($diasMes as $dia)
                            @if ($dia == $contrato->nm_diavencimento_con)
                                <option value="{{ $dia }}" selected>{{ $dia }}</option>
                            @else
                                <option value="{{ $dia }}">{{ $dia }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tx_locacao_con" class="control-label">Taxa de Locação</label>
                    <input type="text" name="tx_locacao_con" value="{{ $contrato->tx_locacao_con }}" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="id_indicereajuste_con" class="control-label">Indice  de Reajuste</label>
                    <input type="text" name="id_indicereajuste_con" value="{{ $contrato->id_indicereajuste_con }}" class="form-control" placeholder="" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="nm_mesreajuste_con" class="control-label">Mês Reajuste</label>
                    <select name="nm_mesreajuste_con" class="form-control" style="width: 15rem;">
                        @foreach ($mes as $key=>$value)
                            @if ($key == $contrato->nm_mesreajuste_con)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_ultimoreajuste_con" class="control-label">Data de Último Reajuste</label>
                    <input type="text" name="dt_ultimoreajuste_con" value="{{ $contrato->dt_ultimoreajuste_con }}" id="dt_ultimoreajuste_con" class="form-control" placeholder="00/00/0000" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="fl_mesfechado_con" class="control-label">flag mes fechado</label>
                    <input type="text" name="fl_mesfechado_con" value="{{ $contrato->fl_mesfechado_con }}" class="form-control" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="id_contabanco_cb" class="control-label">ID Banco</label>
                    <input type="text" name="id_contabanco_cb" value="{{ $contrato->id_contabanco_cb }}" class="form-control" style="width: 15rem;" />
                </div>
                <div class="form-group">
                    <label for="fl_diafixorepasse_con" class="control-label">Dia Fixo Repasse</label>
                    <select name="fl_diafixorepasse_con" class="form-control" style="width: 30rem;">
                        <option value="">Selecione uma opção</option>
                        @foreach ($flagDiaFixoRepasse as $key=>$value)
                            @if ($key == $contrato->fl_diafixorepasse_con)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                    <select name="nm_diarepasse_con" class="form-control" style="width: 15rem;">
                        @foreach ($diasMes as $dia)
                            @if ($key == $contrato->nm_diarepasse_con)
                                <option value="{{ $dia }}" selected>{{ $dia }}</option>
                            @else
                                <option value="{{ $dia }}">{{ $dia }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fl_mesvencido_con" class="control-label">Mês Vencido</label>
                    <select name="fl_mesvencido_con" class="form-control" style="width: 15rem;">
                        @foreach ($flagMesVencido as $key=>$value)
                        @if ($key == $contrato->fl_mesvencido_con)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="st_observacao_con" class="control-label">Observação</label>
                    <input type="text" name="st_observacao_con" value="{{ $contrato->st_observacao_con }}" class="form-control" placeholder="Observação" style="width: 100%;" />
                </div>

                <div class="form-group">
                    <label for="fl_endcobranca_con" class="control-label">Endereço Cobrança</label>
                    <select name="fl_endcobranca_con" class="form-control" style="width: 40rem;">
                        @foreach ($flagEnderecoCobranca as $key=>$value)
                        @if ($key == $contrato->fl_endcobranca_con)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
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
