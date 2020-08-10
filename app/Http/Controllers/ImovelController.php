<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\ProprietarioController;

class ImovelController extends Controller
{
    private $client;
    private $pessoa;
    private $headers;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://apps.superlogica.net/imobiliaria/api/imoveis']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];

        $this->pessoa = new PessoaController();
    }

    public function novoView()
    {
        return view('imoveis.create', [
            'ufs' => $this->retornaUF(),
            'proprietarios' => $this->pessoa->getPessoas(),
            'tipo_imoveis' => $this->retornaTipoImo()
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

    protected function getImovelById($id)
    {
        $body = array('id' => $id, 'apenasColunasPrincipais' => 1, 'status' => 0);
        $response = $this->client->request('GET','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result->data[0];
    }

    public function editarView($id)
    {

        return view('imoveis.edit', [
            'imovel' => $this->getImovelById($id),
            'pessoas' => $this->pessoa->getPessoas(),
            'ufs' => $this->retornaUF()
        ]);
    }
    public function store(Request $request)
    {
        $body = array(
            'PROPRIETARIOS_BENEFICIARIOS[0][ID_PESSOA_PES]' => $request->proprietarios_beneficiarios,
            'PROPRIETARIOS_BENEFICIARIOS[0][FL_PROPRIETARIO_PRB]' => "1",
            'PROPRIETARIOS_BENEFICIARIOS[0][NM_FRACAO_PRB]' => "100.00",
            'ST_TIPO_IMO' => $request->st_tipo_imo,
            'ST_CEP_IMO' => $request->st_cep_imo,
            'ST_ENDERECO_IMO' => $request->st_endereco_imo,
            'ST_NUMERO_IMO' => $request->st_numero_imo,
            'ST_COMPLEMENTO_IMO' => $request->st_complemento_imo,
            'ST_BAIRRO_IMO' => $request->st_bairro_imo,
            'ST_CIDADE_IMO' => $request->st_cidade_imo,
            'ST_ESTADO_IMO' => $request->st_estado_imo,
            'ST_IDENTIFICADOR_IMO' => $request->st_identificador_imo,
            'VL_ALUGUEL_IMO' => $request->vl_aluguel_imo,
            'VL_VENDA_IMO' => $request->vl_venda_imo,
            'TX_ADM_IMO' => $request->tx_adm_imo,
            'FL_TXADMVALORFIXO_IMO' => $request->fl_txadmvalorfixo_imo
        );
        //echo "<pre>".json_encode($body, JSON_PRETTY_PRINT)."</pre>";

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
                'id_imovel_imo' => $request->id_imovel_imo,
                'proprietarios_beneficiarios[0][id_pessoa_pes]' => $request->proprietarios_beneficiarios,
                'st_tipo_imo' => $request->st_tipo_imo,
                'st_cep_imo' => $request->st_cep_imo,
                'st_endereco_imo' => $request->st_endereco_imo,
                'st_numero_imo' => $request->st_numero_imo,
                'st_complemento_imo' => $request->st_complemento_imo,
                'st_bairro_imo' => $request->st_bairro_imo,
                'st_cidade_imo' => $request->st_cidade_imo,
                'st_estado_imo' => $request->st_estado_imo,
                'st_identificador_imo' => $request->st_identificador_imo,
                'vl_aluguel_imo' => $request->vl_aluguel_imo,
                'vl_venda_imo' => $request->vl_venda_imo,
                'tx_adm_imo' => $request->tx_adm_imo,
                'fl_txadmvalorfixo_imo' => $request->fl_txadmvalorfixo_imo
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

    public function retornaTipoImo()
    {
        return $tipo_imo = array(
            1=> 'Casa', 2=> 'Casa em condomínio', 3=> 'Casa comercial', 4=> 'Apartamento', 5=> 'Cobertura', 6=> 'Flat'
        );
    }
}
