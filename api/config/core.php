<?php

class DB_CONNECTION
{

    private $HOST = MED_HOST;
    private $USER = MED_USER;
    private $PASS = MED_PASS;
    private $DBNM = MED_DBNM;
    private $CONN ;

    protected function connection(){

        return $this->CONN = @ new mysqli($this->HOST , $this->USER , $this->PASS , $this->DBNM);

    }

}

class CONNECTION extends DB_CONNECTION
{

    public function getDB(){

        if($this->connection()->connect_error){

            die(" Website Maintenance , Please Contact Admin ");

        }

        else {

            return $this->connection();

        }

    }

}