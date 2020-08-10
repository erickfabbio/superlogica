<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProprietarioController extends Controller
{
    private $client;

    private $headers;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://private-anon-92f81b4c2a-superlogicaimobiliarias.apiary-mock.com/imobiliaria/api/proprietarios']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];
    }

    public function novoView()
    {
        return view('proprietarios.create', [
            'ufs' => $this->retornaUF()
        ]);
    }

    public function index($msg='')
    {
        return view('proprietarios.index', [
            'proprietarios' => $this->getProprietarios(),
            'msg' => $msg
        ]);
    }

    function getProprietarios()
    {
        $response = $this->client->request('GET','',['headers'=>$this->header]);
        $retorno = json_decode($response->getBody()->getContents());

        return $retorno;
    }

    protected function getPessoa($id)
    {
        $body = array('id_pessoa_pes' => $id, 'apenasColunasPrincipais' => 1, 'status' => 0);
        $response = $this->client->request('GET','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }

    public function editarView($id)
    {

        return view('proprietarios.edit', [
            'proprietario' => $this->getPessoa($id)[0],
            'ufs' => $this->retornaUF()
        ]);
    }

    public function store(Request $request)
    {
        $body = array(
            'st_nome_pes' => $request->st_nome_pes,
            'st_fantasia_pes' => $request->st_fantasia_pes,
            'st_cnpj_pes' => $request->st_cnpj_pes,
            'st_celular_pes' => $request->st_celular_pes,
            'st_telefone_pes' => $request->st_telefone_pes,
            'st_email_pes' => $request->st_email_pes,
            'st_rg_pes' => $request->st_rg_pes,
            'st_orgao_pes' => $request->st_orgao_pes,
            'st_sexo_pes' => $request->st_sexo_pes,
            'dt_nascimento_pes' => $request->dt_nascimento_pes,
            'st_nacionalidade_pes' => $request->st_nacionalidade_pes,
            'st_cep_pes' => $request->st_cep_pes,
            'st_endereco_pes' => $request->st_endereco_pes,
            'st_numero_pes' => $request->st_numero_pes,
            'st_complemento_pes' => $request->st_complemento_pes,
            'st_bairro_pes' => $request->st_bairro_pes,
            'st_cidade_pes' => $request->st_cidade_pes,
            'st_estado_pes' => $request->st_estado_pes,
            'st_observacao_pes' => $request->st_observacao_pes
        );

        $response = $this->client->request('POST','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $retorno = "---".$response->getBody()->getContents();

        echo str_replace(", } } ]","} } ]", $retorno);
        //return $this->index($retorno->msg);

    }

    public function atualizar(Request $request)
    {
        $body = array(
            'id_pessoa_pes' => $request->id_pessoa_pes,
            'st_nome_pes' => $request->st_nome_pes,
            'st_fantasia_pes' => $request->st_fantasia_pes,
            'st_cnpj_pes' => $request->st_cnpj_pes,
            'st_celular_pes' => $request->st_celular_pes,
            'st_telefone_pes' => $request->st_telefone_pes,
            'st_email_pes' => $request->st_email_pes,
            'st_rg_pes' => $request->st_rg_pes,
            'st_orgao_pes' => $request->st_orgao_pes,
            'st_sexo_pes' => $request->st_sexo_pes,
            'dt_nascimento_pes' => $request->dt_nascimento_pes,
            'st_nacionalidade_pes' => $request->st_nacionalidade_pes,
            'st_cep_pes' => $request->st_cep_pes,
            'st_endereco_pes' => $request->st_endereco_pes,
            'st_numero_pes' => $request->st_numero_pes,
            'st_complemento_pes' => $request->st_complemento_pes,
            'st_bairro_pes' => $request->st_bairro_pes,
            'st_cidade_pes' => $request->st_cidade_pes,
            'st_estado_pes' => $request->st_estado_pes,
            'st_observacao_pes' => $request->st_observacao_pes
        );

        $response = $this->client->request('PUT','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $retorno = json_decode($response->getBody()->getContents());
        $msg = "Status: ".$retorno[0]->status." - ".$retorno[0]->msg;
        return $this->index($msg);
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
}
