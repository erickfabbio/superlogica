@extends('index')
@section('content')

    <div class="py-4"></div>

    <div class="card">
        <H3 style="margin: 1rem;">Editar Imóvel</H3>


        <div style="padding: 1rem;">
            <form action="{{url('/imoveis/store')}}" method="POST">

                {{csrf_field()}}
                <input type="hidden" name="id_imovel_imo" value="{{ $imovel->data->id_imovel_imo }}">
                <div class="form-group">
                    <label for="proprietarios_beneficiarios" class="control-label">Proprietário</label>
                    <select name="proprietarios_beneficiarios" class="form-control">
                        @foreach ($proprietarios as $proprietario)
                            <option value="{{ $proprietario->data->id_pessoa_pes }}">{{ $proprietario->data->st_nome_pes }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_tipo_imo" class="control-label">Tipo Imóvel</label>
                    <input type="text" value="{{ $imovel->data->st_tipo_imo }}" name="st_tipo_imo" class="form-control" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cep_imo" class="control-label">CEP</label>
                    <input type="text" value="{{ $imovel->data->st_cep_imo }}" name="st_cep_imo" class="form-control" placeholder="CEP" style="width: 100%;" />
                </div>

                <div class="form-group">
                    <label for="st_endereco_imo" class="control-label">Endereço</label>
                    <input type="text" value="{{ $imovel->data->st_endereco_imo }}" name="st_endereco_imo" class="form-control" placeholder="Endereço" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_numero_imo" class="control-label">Número</label>
                    <input type="text" value="{{ $imovel->data->st_numero_imo }}" name="st_numero_imo" class="form-control" placeholder="Número" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_complemento_imo" class="control-label">Complemento</label>
                    <input type="text" value="{{ $imovel->data->st_complemento_imo }}" name="st_complemento_imo" class="form-control" placeholder="Complemento" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_bairro_imo" class="control-label">Bairro</label>
                    <input type="text" value="{{ $imovel->data->st_bairro_imo }}" name="st_bairro_imo" class="form-control" placeholder="Bairro" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_imo" class="control-label">Cidade</label>
                    <input type="text" value="{{ $imovel->data->st_cidade_imo }}" name="st_cidade_imo" class="form-control" placeholder="Cidade" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_estado_imo" class="control-label">Estado</label>
                    <select name="st_estado_imo" class="form-control">
                        @foreach ($ufs as $key=>$value)
                            @if($imovel->data->st_estado_imo == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_identificador_imo" class="control-label">Identificador</label>
                    <input type="text" value="{{ $imovel->data->st_identificador_imo }}" name="st_identificador_imo" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="vl_aluguel_imo" class="control-label">Valor Aluguel</label>
                    <input type="text" value="{{ $imovel->data->vl_aluguel_imo }}" name="vl_aluguel_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="vl_venda_imo" class="control-label">Valor Venda</label>
                    <input type="text" value="{{ $imovel->data->vl_venda_imo }}" name="vl_venda_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="tx_adm_imo" class="control-label">Taxa Administrativa</label>
                    <input type="text" value="{{ $imovel->data->tx_adm_imo }}" name="tx_adm_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="fl_txadmvalorfixo_imo" class="control-label">Taxa Adm Fixo</label>
                    <input type="text" value="{{ $imovel->data->fl_txadmvalorfixo_imo }}" name="fl_txadmvalorfixo_imo" placeholder="0.00" class="form-control" />
                </div>


                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

@endsection
