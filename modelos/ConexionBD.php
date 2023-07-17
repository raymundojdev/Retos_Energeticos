<?php 

class ConexionBD{

    static public function cBD(){

        $bd = new PDO("mysql:host=localhost:8080;dbname=retose_bd", "root", "");

        $bd -> exec("set names utf8");

        return $bd;
    }
}
