<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ImovelController;


class ContratoController extends Controller
{
    private $client;
    private $pessoa;
    private $headers;
    private $imovel;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://apps.superlogica.net/imobiliaria/api/contratos']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];

        $this->pessoa = new PessoaController();
        $this->imovel = new ImovelController();
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

        return view('contratos.index', [
            'contratos' => $retorno,
            'msg' => $msg,
            'pagina' => $pagina,
            'disabled' => $disabled
        ]);
    }

    public function novoView()
    {
        return view('contratos.create', [
            'inquilinos' => $this->pessoa->getPessoas(),
            'imoveis' => $this->imovel->getImoveis(),
            'tipos_contrato' => $this->retornaTipoContrato(),
            'diasMes' => $this->retornaDiasMes(),
            'mes' => $this->retornaMes(),
            'flagDiaFixoRepasse' => $this->retornaDiaFixoRepasse(),
            'flagMesVencido' => $this->retornaFlagMesVencido(),
            'flagEnderecoCobranca' => $this->retornaFlagEnderecoCobranca()
        ]);
    }

    public function getContratoBy($id)
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

        return view('contratos.edit', [
            'contrato' => $this->getContratoBy($id),
            'inquilinos' => $this->pessoa->getPessoas(),
            'imoveis' => $this->imovel->getImoveis(),
            'tipos_contrato' => $this->retornaTipoContrato(),
            'diasMes' => $this->retornaDiasMes(),
            'mes' => $this->retornaMes(),
            'flagDiaFixoRepasse' => $this->retornaDiaFixoRepasse(),
            'flagMesVencido' => $this->retornaFlagMesVencido(),
            'flagEnderecoCobranca' => $this->retornaFlagEnderecoCobranca()
        ]);
    }

    public function store(Request $request)
    {
        $body = array(
                'ST_TIPO_CON' => $request->st_tipo_con,
                'DT_INICIO_CON ' => $request->dt_inicio_con,
                'DT_FIM_CON ' => $request->dt_fim_con,
                'VL_ALUGUEL_CON' => $request->vl_aluguel_con,
                'TX_ADM_CON' => $request->tx_adm_con,
                'FL_TXADMVALORFIXO_CON' => $request->fl_txadmvalorfixo_con,
                'NM_DIAVENCIMENTO_CON' => $request->nm_diavencimento_con,
                'INQUILINOS[0][ID_PESSOA_PES]' => $request->id_inquilino,
                'TX_LOCACAO_CON' => $request->tx_locacao_con,
                'ID_INDICEREAJUSTE_CON' => $request->id_indicereajuste_con,
                'NM_MESREAJUSTE_CON' => $request->nm_mesreajuste_con,
                'DT_ULTIMOREAJUSTE_CON ' => $request->dt_ultimoreajuste_con,
                'FL_MESFECHADO_CON' => $request->fl_mesfechado_con,
                'ID_CONTABANCO_CB' => $request->id_contabanco_cb,
                'FL_DIAFIXOREPASSE_CON' => $request->fl_diafixorepasse_con,
                'NM_DIAREPASSE_CON' => $request->nm_diarepasse_con,
                'FL_MESVENCIDO_CON' => $request->fl_mesvencido_con,
                'FL_DIMOB_CON' => 0,
                'ID_FILIAL_FIL' => 0,
                'ST_OBSERVACAO_CON ' => $request->st_observacao_con,
                'NM_REPASSEGARANTIDO_CON' => -1,
                'FL_GARANTIA_CON' => 0,
                'FL_SEGUROINCENDIO_CON' => 0,
                'FL_ENDCOBRANCA_CON' => $request->fl_endcobranca_con
        );

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
                'ID_CONTRATO_CON' => $request->id_contrato_con,
                'ST_TIPO_CON' => $request->st_tipo_con,
                'DT_INICIO_CON ' => $request->dt_inicio_con,
                'DT_FIM_CON ' => $request->dt_fim_con,
                'VL_ALUGUEL_CON' => $request->vl_aluguel_con,
                'TX_ADM_CON' => $request->tx_adm_con,
                'FL_TXADMVALORFIXO_CON' => $request->fl_txadmvalorfixo_con,
                'NM_DIAVENCIMENTO_CON' => $request->nm_diavencimento_con,
                'INQUILINOS[0][ID_PESSOA_PES]' => $request->id_inquilino,
                'TX_LOCACAO_CON' => $request->tx_locacao_con,
                'ID_INDICEREAJUSTE_CON' => $request->id_indicereajuste_con,
                'NM_MESREAJUSTE_CON' => $request->nm_mesreajuste_con,
                'DT_ULTIMOREAJUSTE_CON ' => $request->dt_ultimoreajuste_con,
                'FL_MESFECHADO_CON' => $request->fl_mesfechado_con,
                'ID_CONTABANCO_CB' => $request->id_contabanco_cb,
                'FL_DIAFIXOREPASSE_CON' => $request->fl_diafixorepasse_con,
                'NM_DIAREPASSE_CON' => $request->nm_diarepasse_con,
                'FL_MESVENCIDO_CON' => $request->fl_mesvencido_con,
                'FL_DIMOB_CON' => 0,
                'ID_FILIAL_FIL' => 0,
                'ST_OBSERVACAO_CON ' => $request->st_observacao_con,
                'NM_REPASSEGARANTIDO_CON' => -1,
                'FL_GARANTIA_CON' => 0,
                'FL_SEGUROINCENDIO_CON' => 0,
                'FL_ENDCOBRANCA_CON' => $request->fl_endcobranca_con
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

    public function retornaTipoContrato()
    {
        return $tipo_contrato = array(
            1 => 'Residencial',
            2 => 'Não residencial',
            3 => 'Comercial',
            4 => 'Indústria',
            5 => 'Temporada',
            6 => 'Por encomenda',
            7 => 'Mista'
        );
    }

    public function retornaFlagEnderecoCobranca()
    {
        return $flag = array(1 => "Usar endereço do imóvel locado", 2 => "Usar endereço do locatário", 3 => "Definir outro endereço");
    }

    public function retornaDiaFixoRepasse()
    {
        return $flag = array(
            0 => "Dias úteis após pagamento do aluguel", 1 => "Dia fixo", 2 => "Dias corridos após pagamento do aluguel"
        );
    }

    public function retornaFlagMesVencido()
    {
        return $flag = array(0 => "Mês vencido", 1 => "Mês a vencer");
    }

    public function retornaDiasMes()
    {
        $dias = array();
        for ($i=1; $i<=31; $i++)
        {
            $dias[$i] = $i;
        }
        return $dias;
    }

    public function retornaMes()
    {
        return $mes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );
    }
}
