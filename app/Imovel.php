<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $fillable = [
        'id_imovel_imo',
        'st_identificador_imo',
        'vl_aluguel_imo',
        'vl_condominio_imo',
        'vl_parcelaiptu_imo',
        'st_tipo_imo',
        'st_codigoiptu_imo',
        'nm_parcelasiptu_imo',
        'nm_txiptuproprietario_imo',
        'nm_txiptuinquilino_imo',
        'fl_responsavelcondominio_imo',
        'st_cep_imo',
        'st_endereco_imo',
        'st_bairro_imo',
        'st_complemento_imo',
        'st_cidade_imo',
        'st_estado_imo',
        'st_numero_imo',
        'st_areautil_imo',
        'st_areatotal_imo',
        'nm_quartos_imo',
        'nm_suites_imo',
        'nm_banheiros_imo',
        'nm_salas_imo',
        'nm_varandas_imo',
        'nm_garagens_imo',
        'nm_piscinas_imo',
        'st_codagua_imo',
        'st_codenergia_imo',
        'st_codgas_imo',
        'st_observacao_imo',
        'st_cartorio_imo',
        'st_matriculacartorio_imo',
        'st_administradora_imo',
        'st_condominio_imo',
        'fl_responsaveliptu_imo',
        'fl_responsavelagua_imo',
        'nm_txaguaproprietario_imo',
        'nm_txaguainquilino_imo',
        'tx_locacao_imo',
        'nm_repassegarantido_imo',
        'fl_status_imo',
        'tx_adm_imo',
        'fl_txadmvalorfixo_imo',
        'fl_txlocacaovalorfixo_imo',
        'nm_parcelastxlocacao_imo',
        'nm_diarepasse_imo',
        'vl_venda_imo',
        'st_codigosequencial_imo',
        'st_codigocidadedimob_imo',
        'st_tipodimob_imo',
        'st_identificadorimportacao_imo',
        'fl_diafixorepasse_imo',
        'id_administradora_adm',
        'st_iptugaragem_imo',
        'st_sincrofilial_imo',
        'inquilinos',
        'angariadores',
        'nome_formatado',
        'nome_proprietario',
        'cnpj_proprietario',
        'detalhes_formatado'
    ];
}