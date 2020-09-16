<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of FbitsController
 *
 * @author weslley
 */
class BIBoletoCobController {
        
    public static $instance;
    
    private $token;
    
    private $config;
    
    private function __construct() {
        $this->config = [];
        $this->token = null;
    }
    
    public static function getInstance() : BIBoletoCobController{
        if (!isset(self::$instance)) {
            self::$instance = new BIBoletoCobController();
        }
        
        return self::$instance;
    }
    
    public function getToken() {
        return $this->token;
    }

    public function setToken($token) {
        $this->token = $token;
        return $this;
    }
    
    public function getConfig() {
        return $this->config;
    }

    public function setConfig(array $config) {
        $this->config = $config;
        return $this;
    }
}
