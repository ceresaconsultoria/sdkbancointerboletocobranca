<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of Baixa
 *
 * @author weslley
 */
class Baixa extends Core\Http{
    
    const CODIGO_BAIXA_ACERTOS = "ACERTOS";
    const CODIGO_BAIXA_PROTESTADO = "PROTESTADO";
    const CODIGO_BAIXA_DEVOLUCAO = "DEVOLUCAO";
    const CODIGO_BAIXA_PROTESTOAPOSBAIXA = "PROTESTOAPOSBAIXA";
    const CODIGO_BAIXA_PAGODIRETOAOCLIENTE = "PAGODIRETOAOCLIENTE";
    const CODIGO_BAIXA_SUBISTITUICAO = "SUBISTITUICAO";
    const CODIGO_BAIXA_FALTADESOLUCAO = "FALTADESOLUCAO";
    const CODIGO_BAIXA_APEDIDODOCLIENTE = "APEDIDODOCLIENTE";
    
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function executar($nossoNumero, $codigoBaixa){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->post($nossoNumero."/baixas", array(
            "json" => array(
                "codigoBaixa" => $codigoBaixa
            ),
            "headers" => [
                "Authorization" => $controller->getTokenType() . ' ' . $controller->getAccessToken()
            ],
            "cert" => $controller->getCert(),
            "ssl_key" => $controller->getSslKey()
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
}
