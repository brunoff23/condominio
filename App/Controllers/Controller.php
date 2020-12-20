<?php

class Controller {

    protected $f3 = null;
    protected $db;

    public function __construct() {
        
        $f3 = Base::instance();
        $this->f3 = $f3;
        

        try{
            $db = new DB\SQL(
                $f3->get('devdb_config'),
                $f3->get('devdb_user'),
                $f3->get('devdb_pass'),
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            );
            $this->db = $db;

        } catch(Exception $e) {
            echo $e;
        }
        
    }
}