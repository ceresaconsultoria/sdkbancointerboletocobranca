<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of GerarBoleto
 *
 * @author weslley
 */
class Emissao extends Core\Http{
    
    const NUM_DIAS_AGENDA_SETE = 7;
    const NUM_DIAS_AGENDA_TRINTA = 30;
    const NUM_DIAS_AGENDA_SESSENTA = 60;
    
    const TIPO_PESSOA_FISICA = "FISICA";
    const TIPO_PESSOA_JURIDICA = "JURIDICA";
    
    const CODIGO_DESCONTO_NAOTEMDESCONTO = "NAOTEMDESCONTO";
    const CODIGO_DESCONTO_VALORFIXODATAINFORMADA = "VALORFIXODATAINFORMADA";
    const CODIGO_DESCONTO_PERCENTUALDATAINFORMADA = "PERCENTUALDATAINFORMADA";
    const CODIGO_DESCONTO_VALORANTECIPACAODIACORRIDO = "VALORANTECIPACAODIACORRIDO";
    const CODIGO_DESCONTO_VALORANTECIPACAODIAUTIL = "VALORANTECIPACAODIAUTIL";
    const CODIGO_DESCONTO_PERCENTUALVALORNOMINALDIACORRIDO = "PERCENTUALVALORNOMINALDIACORRIDO";
    const CODIGO_DESCONTO_PERCENTUALVALORNOMINALDIAUTIL = "PERCENTUALVALORNOMINALDIAUTIL";
    
    const MULTA_NAOTEMMULTA = "VALORFIXO";
    const MULTA_VALORFIXO = "VALORFIXO";
    const MULTA_PERCENTUAL = "PERCENTUAL";
    
    const MORA_VALORDIA = "VALORDIA";
    const MORA_TAXAMENSAL = "TAXAMENSAL";
    const MORA_ISENTO = "ISENTO";
    
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function incluir(array $body){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->post("cobranca/v2/boletos", array(
            "headers" => [
                "Authorization" => $controller->getTokenType() . ' ' . $controller->getAccessToken()
            ],
            "json" => $body,
            "cert" => $controller->getCert(),
            "ssl_key" => $controller->getSslKey()
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
}
