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
    
    private $crtPath;
    
    private $crtPass;
    
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
    
    public function getCrtPath() {
        return $this->crtPath;
    }

    public function setCrtPath($crtPath) {
        $this->crtPath = $crtPath;
        return $this;
    }
    
    public function getCrtPass() {
        return $this->crtPass;
    }

    public function setCrtPass($crtPass) {
        $this->crtPass = $crtPass;
        return $this;
    }
}
