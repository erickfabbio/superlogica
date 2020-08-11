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
                    <label for="ID_IMOVEL_IMO" class="control-label">Imóvel</label>
                    <select name="ID_IMOVEL_IMO" class="form-control">
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
                    <label for="st_cep_imo" class="control-label">CEP</label>
                    <input type="text" name="st_cep_imo" class="form-control" placeholder="CEP" style="width: 50%;" />
                </div>

                <div class="form-group">
                    <label for="st_endereco_imo" class="control-label">Endereço</label>
                    <input type="text" name="st_endereco_imo" class="form-control" placeholder="Endereço" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_numero_imo" class="control-label">Número</label>
                    <input type="text" name="st_numero_imo" class="form-control" placeholder="Número" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_complemento_imo" class="control-label">Complemento</label>
                    <input type="text" name="st_complemento_imo" class="form-control" placeholder="Complemento" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_bairro_imo" class="control-label">Bairro</label>
                    <input type="text" name="st_bairro_imo" class="form-control" placeholder="Bairro" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_imo" class="control-label">Cidade</label>
                    <input type="text" name="st_cidade_imo" class="form-control" placeholder="Cidade" style="width: 100%;" />
                </div>



                <div class="form-group">
                    <label for="st_identificador_imo" class="control-label">Identificador</label>
                    <input type="text" name="st_identificador_imo" class="form-control"  placeholder="Código do Imóvel em outro sistema..." />
                </div>

                <div class="form-group">
                    <label for="vl_aluguel_imo" class="control-label">Valor Aluguel</label>
                    <input type="text" name="vl_aluguel_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="vl_venda_imo" class="control-label">Valor Venda</label>
                    <input type="text" name="vl_venda_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="tx_adm_imo" class="control-label">Taxa Administrativa</label>
                    <input type="text" name="tx_adm_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="fl_txadmvalorfixo_imo" class="control-label">Taxa Adm Fixo</label>
                    <input type="text" name="fl_txadmvalorfixo_imo" placeholder="0.00" class="form-control" />
                </div>


                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

@endsection
