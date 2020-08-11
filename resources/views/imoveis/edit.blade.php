@extends('index')
@section('content')

    <div class="py-4"></div>

    <div class="card-header" style="padding: 1rem;">
        <h4 class="card-body">Editar Imóvel</h4>
    </div>

    <div class="card">

        <div style="padding: 1rem;">
            <form action="{{url('/imoveis/store')}}" method="POST">

                {{csrf_field()}}
                <input type="hidden" name="id_imovel_imo" value="{{ $imovel->id_imovel_imo }}">
                <div class="form-group">
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Proprietários</h4>
                        <hr>
                        @foreach ($imovel->proprietarios_beneficiarios as $proprietario)
                        <p class="mb-0">{{ $proprietario->st_nome_pes }} </p>
                        @endforeach

                    </div>

                </div>

                <div class="form-group">
                    <label for="st_tipo_imo" class="control-label">Tipo Imóvel</label>
                    <select name="st_tipo_imo" class="form-control" style="width: 50%;">
                        <option value="">Selecione um tipo</option>
                        @foreach ($tipo_imoveis as $key=>$value)
                            @if($imovel->st_tipo_imo == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="st_cep_imo" class="control-label">CEP</label>
                    <input type="text" value="{{ $imovel->st_cep_imo }}" name="st_cep_imo" class="form-control" placeholder="CEP" style="width: 50%;" />
                </div>

                <div class="form-group">
                    <label for="st_endereco_imo" class="control-label">Endereço</label>
                    <input type="text" value="{{ $imovel->st_endereco_imo }}" name="st_endereco_imo" class="form-control" placeholder="Endereço" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_numero_imo" class="control-label">Número</label>
                    <input type="text" value="{{ $imovel->st_numero_imo }}" name="st_numero_imo" class="form-control" placeholder="Número" style="width: 30rem;" />
                </div>
                <div class="form-group">
                    <label for="st_complemento_imo" class="control-label">Complemento</label>
                    <input type="text" value="{{ $imovel->st_complemento_imo }}" name="st_complemento_imo" class="form-control" placeholder="Complemento" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_bairro_imo" class="control-label">Bairro</label>
                    <input type="text" value="{{ $imovel->st_bairro_imo }}" name="st_bairro_imo" class="form-control" placeholder="Bairro" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_imo" class="control-label">Cidade</label>
                    <input type="text" value="{{ $imovel->st_cidade_imo }}" name="st_cidade_imo" class="form-control" placeholder="Cidade" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_estado_imo" class="control-label">Estado</label>
                    <select name="st_estado_imo" class="form-control" style="width: 50%;">
                        @foreach ($ufs as $key=>$value)
                            @if($imovel->st_estado_imo == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_identificador_imo" class="control-label">Identificador</label>
                    <input type="text" value="{{ $imovel->st_identificador_imo }}" name="st_identificador_imo" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="vl_aluguel_imo" class="control-label">Valor Aluguel</label>
                    <input type="text" value="{{ $imovel->vl_aluguel_imo }}" name="vl_aluguel_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="vl_venda_imo" class="control-label">Valor Venda</label>
                    <input type="text" value="{{ $imovel->vl_venda_imo }}" name="vl_venda_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="tx_adm_imo" class="control-label">Taxa Administrativa</label>
                    <input type="text" value="{{ $imovel->tx_adm_imo }}" name="tx_adm_imo" placeholder="0.00" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="fl_txadmvalorfixo_imo" class="control-label">Taxa Adm Fixo</label>
                    <input type="text" value="{{ $imovel->fl_txadmvalorfixo_imo }}" name="fl_txadmvalorfixo_imo" placeholder="0.00" class="form-control" />
                </div>


                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

@endsection
