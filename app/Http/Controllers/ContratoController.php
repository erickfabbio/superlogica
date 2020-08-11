<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ContratoController extends Controller
{
    private $client;

    private $headers;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://apps.superlogica.net/imobiliaria/api/contratos']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];
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
}
