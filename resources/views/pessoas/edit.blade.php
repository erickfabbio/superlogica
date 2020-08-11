@extends('index')
@section('content')

    <div class="card-header" style="padding: 1rem;">
        <h4 class="card-body">Editar {{ $pessoa->st_nome_pes }}</h4>
    </div>

    <div class="card">

        <div style="padding: 1rem;">
            <form action="{{url('/pessoas/update')}}" method="POST">

                {{csrf_field()}}
                <input type="hidden" name="id_pessoa_pes" value="{{ $pessoa->id_pessoa_pes }}" />
                <div class="form-group">
                    <label for="st_nome_pes" class="control-label">Nome</label>
                    <input type="text" value="{{ $pessoa->st_nome_pes }}" name="st_nome_pes" class="form-control" placeholder="Nome" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_fantasia_pes" class="control-label">Nome Fantasia</label>
                    <input type="text" value="{{ $pessoa->st_fantasia_pes }}" name="st_fantasia_pes" class="form-control" placeholder="nome_fantasia" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cnpj_pes" class="control-label">CPF</label>
                    <input type="text" value="{{ $pessoa->st_cnpj_pes }}" name="st_cnpj_pes" id="cpf" class="form-control" placeholder="CPF" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_celular_pes" class="control-label">Celular</label>
                    <input type="text" value="{{ $pessoa->st_celular_pes }}" name="st_celular_pes" id="celular" class="form-control" placeholder="celular" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_telefone_pes" class="control-label">Telefone</label>
                    <input type="text" value="{{ $pessoa->st_telefone_pes }}" name="st_telefone_pes" id="telefone" class="form-control" placeholder="Telefone" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_email_pes" class="control-label">E-mail</label>
                    <input type="text" value="{{ $pessoa->st_email_pes }}" name="st_email_pes" class="form-control" placeholder="email" style="width: 100%;" />
                </div>

                <div class="form-group">
                    <label for="st_rg_pes" class="control-label">RG</label>
                    <input type="text" value="{{ $pessoa->st_rg_pes }}" name="st_rg_pes" class="form-control" placeholder="RG" style="width: 50%;" />
                    <input type="text" value="{{ $pessoa->st_orgao_pes }}" name="st_orgao_pes" class="form-control" placeholder="Órgão Emissor" style="width: 30%;" />
                </div>
                <div class="form-group">
                    <label for="st_sexo_pes" class="control-label">Sexo</label>
                    <select name="st_sexo_pes" class="form-control" style="width: 30rem;">
                        @foreach ($sexos as $key=>$value)
                            @if($pessoa->st_sexo_pes == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_nascimento_pes" class="control-label">Data de Nascimento</label>
                    <input type="text" value="{{ $pessoa->dt_nascimento_pes }}" name="dt_nascimento_pes" id="datanascimento" class="form-control" placeholder="00/00/0000" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_nacionalidade_pes" class="control-label">Nacionalidade</label>
                    <input type="text" value="{{ $pessoa->st_nacionalidade_pes }}" name="st_nacionalidade_pes" class="form-control" placeholder="Nacionalidade" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_cep_pes" class="control-label">CEP</label>
                    <input type="text" value="{{ $pessoa->st_cep_pes }}" style="width: 30rem;" name="st_cep_pes" id="cep" class="form-control" placeholder="CEP" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_endereco_pes" class="control-label">Endereço</label>
                    <input type="text" value="{{ $pessoa->st_endereco_pes }}" name="st_endereco_pes" class="form-control" placeholder="Endereço" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_numero_pes" class="control-label">Número</label>
                    <input type="text" value="{{ $pessoa->st_numero_pes }}" name="st_numero_pes" class="form-control" placeholder="Número" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_complemento_pes" class="control-label">Complemento</label>
                    <input type="text" value="{{ $pessoa->st_complemento_pes }}" name="st_complemento_pes" class="form-control" placeholder="Complemento" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_bairro_pes" class="control-label">Bairro</label>
                    <input type="text" value="{{ $pessoa->st_bairro_pes }}" name="st_bairro_pes" class="form-control" placeholder="Bairro" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_pes" class="control-label">Cidade</label>
                    <input type="text" value="{{ $pessoa->st_cidade_pes }}" name="st_cidade_pes" class="form-control" placeholder="Cidade" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_pes" class="control-label">Estado</label>
                    <select name="st_estado_pes" class="form-control">
                        @foreach ($ufs as $key=>$value)
                            @if($pessoa->st_estado_pes == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_observacao_pes" class="control-label">Observação</label>
                    <input type="text" value="{{ $pessoa->st_observacao_pes }}" name="st_observacao_pes" class="form-control" placeholder="Observação" style="width: 100%;" />
                </div>

                <button class="btn btn-primary" style="float: right;">salvar</button>
                <a href="{{ url('/pessoas') }}" class="btn btn-secondary" style="float: right; margin-right:15px;">cancelar</a>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $("#celular").mask("(00) 000000000");
        $("#telefone").mask("(00) 00000000");
        $("#cpf").mask("00000000000");

        $("#datanascimento").mask("00/00/0000");
        $("#cep").mask("00000-000");
    </script>

@endsection
