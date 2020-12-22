<?php

class Controller {

    protected $db;

    public function __construct(\Base $f3) {

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

    public function checkLogin(\Base $f3) {
        if(!$f3->get('SESSION.logged')) {
            $f3->set('SESSION.erro', 2);
            $f3->reroute('/login');
        }
    }
}