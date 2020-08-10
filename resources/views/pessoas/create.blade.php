@extends('index')
@section('content')

    <div class="py-4"></div>

    <div class="card-header" style="padding: 1rem;">
        <h4 class="card-body">Cadastrar Pessoa</h4>
    </div>

    <div class="card">

        <div style="padding: 1rem;">
            <form action="{{url('/pessoas/store')}}" method="POST">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="st_nome_pes" class="control-label">Nome</label>
                    <input type="text" name="st_nome_pes" class="form-control" placeholder="Nome" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_fantasia_pes" class="control-label">Nome Fantasia</label>
                    <input type="text" name="st_fantasia_pes" class="form-control" placeholder="Nome Fantasia" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cnpj_pes" class="control-label">CNPJ</label>
                    <input type="text" name="st_cnpj_pes" class="form-control" placeholder="CNPJ" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_celular_pes" class="control-label">Celular</label>
                    <input type="text" name="st_celular_pes" class="form-control" placeholder="Celular" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_telefone_pes" class="control-label">Telefone</label>
                    <input type="text" name="st_telefone_pes" class="form-control" placeholder="Telefone" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_email_pes" class="control-label">E-mail</label>
                    <input type="text" name="st_email_pes" class="form-control" placeholder="E-mail" style="width: 100%;" />
                </div>

                <div class="form-group">
                    <label for="st_rg_pes" class="control-label">RG</label>
                    <input type="text" name="st_rg_pes" class="form-control" placeholder="RG" style="width: 50%;" />
                    <input type="text" name="st_orgao_pes" class="form-control" placeholder="Órgão Emissor" style="width: 30%;" />
                </div>
                <div class="form-group">
                    <label for="st_sexo_pes" class="control-label">Sexo</label>
                    <select name="st_sexo_pes" class="form-control">
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dt_nascimento_pes" class="control-label">Data de Nascimento</label>
                    <input type="text" name="dt_nascimento_pes" class="form-control" placeholder="00/00/0000" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_nacionalidade_pes" class="control-label">Nacionalidade</label>
                    <input type="text" name="st_nacionalidade_pes" class="form-control" placeholder="Nacionalidade" style="width: 50%;" />
                </div>
                <div class="form-group">
                    <label for="st_cep_pes" class="control-label">CEP</label>
                    <input type="text" name="st_cep_pes" class="form-control" placeholder="CEP" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_endereco_pes" class="control-label">Endereço</label>
                    <input type="text" name="st_endereco_pes" class="form-control" placeholder="Endereço" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_numero_pes" class="control-label">Número</label>
                    <input type="text" name="st_numero_pes" class="form-control" placeholder="Número" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_complemento_pes" class="control-label">Complemento</label>
                    <input type="text" name="st_complemento_pes" class="form-control" placeholder="Complemento" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_bairro_pes" class="control-label">Bairro</label>
                    <input type="text" name="st_bairro_pes" class="form-control" placeholder="Bairro" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_pes" class="control-label">Cidade</label>
                    <input type="text" name="st_cidade_pes" class="form-control" placeholder="Cidade" style="width: 100%;" />
                </div>
                <div class="form-group">
                    <label for="st_cidade_pes" class="control-label">Estado</label>
                    <select name="st_estado_pes" class="form-control">
                        @foreach ($ufs as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="st_observacao_pes" class="control-label">Observação</label>
                    <input type="text" name="st_observacao_pes" class="form-control" placeholder="Observação" style="width: 100%;" />
                </div>

                <button class="btn btn-primary" style="float: right;">salvar </button>
            </form>
        </div>
    </div>

@endsection
