<?php 

class ConexionBD{

    static public function cBD(){

        $bd = new PDO("mysql:host=db5013063583.hosting-data.io;dbname=dbs10968092", "dbu2636717", "R4y$%2023_base!+");

        $bd -> exec("set names utf8");

        return $bd;
    }
}
