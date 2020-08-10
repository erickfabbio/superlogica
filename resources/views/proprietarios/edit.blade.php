@extends('index')
@section('content')

    <div class="py-4"></div>

    <div class="card">
        <H3 style="margin: 1rem;">Editar {{ $proprietario->data->st_nome_pes }}</H3>

        <div style="padding: 1rem;">
            <form action="{{url('/proprietarios/update')}}" method="POST">

                {{csrf_field()}}
                <input type="hidden" value="{{ $proprietario->data->id_pessoa_pes }}" />
                <div class="form-group">
                    <label for="st_nome_pes" class="control-label">Nome</label>
                    <input type="text" value="{{ $proprietario->data->st_nome_pes }}" name="st_nome_pes" class="form-control" placeholder="Nome" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_fantasia_pes" class="control-label">Nome Fantasia</label>
                    <input type="text" value="{{ $proprietario->data->st_fantasia_pes }}" name="st_fantasia_pes" class="form-control" placeholder="nome_fantasia" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cnpj_pes" class="control-label">CNPJ</label>
                    <input type="text" value="{{ $proprietario->data->st_cnpj_pes }}" name="st_cnpj_pes" class="form-control" placeholder="cnpj" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_celular_pes" class="control-label">Celular</label>
                    <input type="text" value="{{ $proprietario->data->st_celular_pes }}" name="st_celular_pes" class="form-control" placeholder="celular" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_telefone_pes" class="control-label">Telefone</label>
                    <input type="text" value="{{ $proprietario->data->st_telefone_pes }}" name="st_telefone_pes" class="form-control" placeholder="Telefone" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_email_pes" class="control-label">E-mail</label>
                    <input type="text" value="{{ $proprietario->data->st_email_pes }}" name="st_email_pes" class="form-control" placeholder="email" style="width: 100%;" />
                </div>

                <div class="form-group">
                    <label for="st_rg_pes" class="control-label">RG</label>
                    <input type="text" value="{{ $proprietario->data->st_rg_pes }}" name="st_rg_pes" class="form-control" placeholder="RG" style="width: 50%;" />
                    <input type="text" value="{{ $proprietario->data->st_orgao_pes }}" name="st_orgao_pes" class="form-control" placeholder="Órgão Emissor" style="width: 30%;" />
                </div>
                <div class="form-group">
                    <label for="st_sexo_pes" class="control-label">Sexo</label>
                    <select name="st_sexo_pes" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_nascimento_pes" class="control-label">Data de Nascimento</label>
                    <input type="text" value="{{ $proprietario->data->dt_nascimento_pes }}" name="dt_nascimento_pes" class="form-control" placeholder="Nacionalidade" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_nacionalidade_pes" class="control-label">Nacionalidade</label>
                    <input type="text" value="{{ $proprietario->data->st_nacionalidade_pes }}" name="st_nacionalidade_pes" class="form-control" placeholder="Nacionalidade" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_cep_pes" class="control-label">CEP</label>
                    <input type="text" value="{{ $proprietario->data->st_cep_pes }}" name="st_complemento_pes" class="form-control" placeholder="CEP" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_endereco_pes" class="control-label">Endereço</label>
                    <input type="text" value="{{ $proprietario->data->st_endereco_pes }}" name="st_endereco_pes" class="form-control" placeholder="Endereço" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_numero_pes" class="control-label">Número</label>
                    <input type="text" value="{{ $proprietario->data->st_numero_pes }}" name="st_complemento_pes" class="form-control" placeholder="Número" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_complemento_pes" class="control-label">Complemento</label>
                    <input type="text" value="{{ $proprietario->data->st_complemento_pes }}" name="st_complemento_pes" class="form-control" placeholder="Complemento" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_bairro_pes" class="control-label">Bairro</label>
                    <input type="text" value="{{ $proprietario->data->st_bairro_pes }}" name="st_bairro_pes" class="form-control" placeholder="Bairro" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_pes" class="control-label">Cidade</label>
                    <input type="text" value="{{ $proprietario->data->st_cidade_pes }}" name="st_cidade_pes" class="form-control" placeholder="Cidade" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_pes" class="control-label">Estado</label>
                    <select name="st_estado_pes" class="form-control">
                        @foreach ($ufs as $key=>$value)
                            @if($proprietario->data->st_estado_pes == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_observacao_pes" class="control-label">Observação</label>
                    <input type="text" value="{{ $proprietario->data->st_observacao_pes }}" name="st_complemento_pes" class="form-control" placeholder="Observação" style="width: 100%;" />
                </div>

                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

@endsection
