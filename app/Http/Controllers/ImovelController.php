<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\ProprietarioController;

class ImovelController extends Controller
{
    private $client;
    private $proprietario;
    private $headers;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://private-anon-92f81b4c2a-superlogicaimobiliarias.apiary-mock.com/imobiliaria/api/imoveis']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];

        $this->proprietario = new ProprietarioController();
    }

    public function novoView()
    {
        return view('imoveis.create', [
            'ufs' => $this->retornaUF(),
            'proprietarios' => $this->proprietario->getProprietarios()
        ]);
    }

    public function index($msg='')
    {
        $response = $this->client->request('GET','',['headers'=>$this->header]);
        $retorno = json_decode($response->getBody()->getContents());

        return view('imoveis.index', [
            'imoveis' => $retorno,
            'msg' => $msg
        ]);
    }

    protected function getImovel($id)
    {
        $body = array('id' => $id, 'apenasColunasPrincipais' => 1, 'status' => 0);
        $response = $this->client->request('GET','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }

    public function editarView($id)
    {

        return view('imoveis.edit', [
            'imovel' => $this->getImovel($id)[0],
            'proprietarios' => $this->proprietario->getProprietarios(),
            'ufs' => $this->retornaUF()
        ]);
    }
    public function store(Request $request)
    {
        $body = array(
            'st_nome_pes' => $request->st_nome_pes
        );
        $response = $this->client->request('POST','',[
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
