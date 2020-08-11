<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\PessoaController;

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

        return view('imoveis.index', [
            'imoveis' => $retorno,
            'msg' => $msg,
            'pagina' => $pagina,
            'disabled' => $disabled
        ]);
    }

    public function novoView()
    {
        return view('imoveis.create', [
            'ufs' => $this->retornaUF(),
            'proprietarios' => $this->pessoa->getPessoas(),
            'tipo_imoveis' => $this->retornaTipoImo()
        ]);
    }

    public function getImoveis()
    {
        $response = $this->client->request('GET','',['headers'=>$this->header]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
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
            'ufs' => $this->retornaUF(),
            'tipo_imoveis' => $this->retornaTipoImo()
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
            return $this->index(1, $retorno->data[0]->msg);
        } else {
            return $this->index(1, $retorno->msg);
        }
    }

    public function atualizar(Request $request)
    {
        $body = array(
                'ID_IMOVEL_IMO' => $request->id_imovel_imo,
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

        $response = $this->client->request('PUT','',[
            'headers'=>$this->header,
            'body'=> json_encode($body)
        ]);
        $retorno = json_decode($response->getBody()->getContents());
        if ($retorno->status == '206') {
            return $this->index(1,$retorno->data[0]->msg);
        } else {
            return $this->index(1,$retorno->msg);
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

    public function retornaTipoImo()
    {
        return $tipo_imo = array(
            1=> 'Casa', 2=> 'Casa em condomínio', 3=> 'Casa comercial', 4=> 'Apartamento', 5=> 'Cobertura', 6=> 'Flat'
        );
    }
}
