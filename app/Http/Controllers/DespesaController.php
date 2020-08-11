<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DespesaController extends Controller
{
    private $client;
    private $headers;

    /*  */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://apps.superlogica.net/imobiliaria/api/imoveisdespesa']);
        $this->header = [
            'content-type' => 'application/json',
            'app_token' => 'f9ad4d06-2373-3621-b8c3-e1fed4efea7e',
            'access_token' => 'a09f3cde-4060-3740-8b3a-5498b1d3fb88'
        ];

    }

    public function index($contrato, $msg='')
    {
        return view('despesas.index',[
            'contrato' => $contrato,
            'despesas' => $this->getDespesas(),
            'msg' => $msg
        ]);
    }

    public function getDespesas()
    {
        $response = $this->client->request('GET','',['headers'=>$this->header]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }
}
