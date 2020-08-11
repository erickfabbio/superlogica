<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PessoaController extends Controller
{
    private $client;

    private $headers;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://apps.superlogica.net/imobiliaria/api/pessoas']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];
    }

    public function novoView()
    {
        return view('pessoas.create', [
            'ufs' => $this->retornaUF(),
            'sexos' => $this->retornaSexo()
        ]);
    }

    public function index($pagina=1, $msg='')
    {
        $body = json_encode(array('pagina' => $pagina));
        $response = $this->client->request('GET','',[
            'headers'=>$this->header,
            'body' => $body
        ]);
        $retorno = json_decode($response->getBody()->getContents());
        $disabled ='';
        if ($pagina == 1)
            $disabled = "disabled";

        return view('pessoas.index', [
            'pessoas' => $retorno,
            'msg' => $msg,
            'pagina' => $pagina,
            'disabled' => $disabled
        ]);
    }

    function getPessoas()
    {
        $response = $this->client->request('GET','',['headers'=>$this->header]);
        $retorno = json_decode($response->getBody()->getContents());

        return $retorno;
    }

    protected function getPessoaById($id)
    {
        $body = array('id' => $id);

        $response = $this->client->request('GET','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result->data[0];
    }

    public function editarView($id)
    {
        return view('pessoas.edit', [
            'pessoa' => $this->getPessoaById($id),
            'ufs' => $this->retornaUF(),
            'sexos' => $this->retornaSexo()
        ]);
    }

    public function store(Request $request)
    {
        $body = array(
            'ST_NOME_PES' => $request->st_nome_pes,
            'ST_FANTASIA_PES' => $request->st_fantasia_pes,
            'ST_CNPJ_PES' => $request->st_cnpj_pes,
            'ST_CELULAR_PES' => $request->st_celular_pes,
            'ST_TELEFONE_PES' => $request->st_telefone_pes,
            'ST_EMAIL_PES' => $request->st_email_pes,
            'ST_RG_PES' => $request->st_rg_pes,
            'ST_ORGAO_PES' => $request->st_orgao_pes,
            'ST_SEXO_PES' => $request->st_sexo_pes,
            'DT_NASCIMENTO_PES' => $request->dt_nascimento_pes,
            'ST_NACIONALIDADE_PES' => $request->st_nacionalidade_pes,
            'ST_CEP_PES' => $request->st_cep_pes,
            'ST_ENDERECO_PES' => $request->st_endereco_pes,
            'ST_NUMERO_PES' => $request->st_numero_pes,
            'ST_COMPLEMENTO_PES' => $request->st_complemento_pes,
            'ST_BAIRRO_PES' => $request->st_bairro_pes,
            'ST_CIDADE_PES' => $request->st_cidade_pes,
            'ST_ESTADO_PES' => $request->st_estado_pes,
            'ST_OBSERVACAO_PES' => $request->st_observacao_pes,
            'FL_PROPRIETARIOBENEFICIARIO_PES' => 1
        );

        $response = $this->client->request('POST','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $retorno = json_decode($response->getBody()->getContents());
        if ($retorno->status == '206') {
            return $this->index($retorno->data[0]->msg);
        } else {
            return $this->index($retorno->msg);
        }

    }

    public function atualizar(Request $request)
    {
        $body = array(
            'ID_PESSOA_PES' => $request->id_pessoa_pes,
            'ST_NOME_PES' => $request->st_nome_pes,
            'ST_FANTASIA_PES' => $request->st_fantasia_pes,
            'ST_CNPJ_PES' => $request->st_cnpj_pes,
            'ST_CELULAR_PES' => $request->st_celular_pes,
            'ST_TELEFONE_PES' => $request->st_telefone_pes,
            'ST_EMAIL_PES' => $request->st_email_pes,
            'ST_RG_PES' => $request->st_rg_pes,
            'ST_ORGAO_PES' => $request->st_orgao_pes,
            'ST_SEXO_PES' => $request->st_sexo_pes,
            'DT_NASCIMENTO_PES' => $request->dt_nascimento_pes,
            'ST_NACIONALIDADE_PES' => $request->st_nacionalidade_pes,
            'ST_CEP_PES' => $request->st_cep_pes,
            'ST_ENDERECO_PES' => $request->st_endereco_pes,
            'ST_NUMERO_PES' => $request->st_numero_pes,
            'ST_COMPLEMENTO_PES' => $request->st_complemento_pes,
            'ST_BAIRRO_PES' => $request->st_bairro_pes,
            'ST_CIDADE_PES' => $request->st_cidade_pes,
            'ST_ESTADO_PES' => $request->st_estado_pes,
            'ST_OBSERVACAO_PES' => $request->st_observacao_pes,
            'FL_PROPRIETARIOBENEFICIARIO_PES' => 1
        );

        $response = $this->client->request('PUT','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $retorno = json_decode($response->getBody()->getContents());
        if ($retorno->status == '206') {
            return $this->index($retorno->data[0]->msg);
        } else {
            return $this->index($retorno->msg);
        }
    }

    public function retornaUF()
    {
        return $uf = array(
            'AC'=>'Acre',
            'AL'=>'Alagoas',
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RR'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins');
    }

    public function retornaSexo()
    {
        return $sexos = array(1 => 'Masculino', 2 => 'Feminino');
    }
}
