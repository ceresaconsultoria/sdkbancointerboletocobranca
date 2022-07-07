<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of Consulta
 *
 * @author weslley
 */
class Consulta extends Core\Http{
    
    const FILTRAR_POR_TODOS = "TODOS";
    const FILTRAR_POR_VENCIDOSAVENCER = "VENCIDOSAVENCER";
    const FILTRAR_POR_EXPIRADOS = "EXPIRADOS";
    const FILTRAR_POR_PAGOS = "PAGOS";
    const FILTRAR_POR_TODOSBAIXADOS = "TODOSBAIXADOS";
    
    const FILTRAR_DATA_POR_VENCIMENTO = "VENCIMENTO";
    const FILTRAR_DATA_POR_EMISSAO = "EMISSAO";
    const FILTRAR_DATA_POR_SITUACAO = "SITUACAO";
    
    const ORDENAR_POR_NOSSONUMERO = "NOSSONUMERO";
    const ORDENAR_POR_SEUNUMERO = "SEUNUMERO";
    const ORDENAR_POR_DATAVENCIMENTO_ASC = "DATAVENCIMENTO_ASC";
    const ORDENAR_POR_DATAVENCIMENTO_DSC = "DATAVENCIMENTO_DSC";
    const ORDENAR_POR_NOMESACADO = "NOMESACADO";
    const ORDENAR_POR_VALOR_ASC = "VALOR_ASC";
    const ORDENAR_POR_VALOR_DSC = "VALOR_DSC";
    const ORDENAR_POR_STATUS_ASC = "STATUS_ASC";
    const ORDENAR_POR_STATUS_DSC = "STATUS_DSC";
    
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function listar(array $query = []){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->get("", array(
            "query" => $query,
            "headers" => [
                "x-inter-conta-corrente" => $controller->getToken(),
            ],
            "cert" => [$controller->getCert(), $controller->getPassphrase()],
            "ssl_key" => [$controller->getSslKey(), $controller->getPassphrase()]
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
    
    public function detalhes($nossoNumero){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->get($nossoNumero, array(
            "headers" => [
                "x-inter-conta-corrente" => $controller->getToken(),
            ],
            "cert" => [$controller->getCert(), $controller->getPassphrase()],
            "ssl_key" => [$controller->getSslKey(), $controller->getPassphrase()]
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
}
