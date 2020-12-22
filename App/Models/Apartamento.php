<?php

class Apartamento extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'dadosCombinados');
    }

    public function all() {
        $this->load();
        return $this->query;
    }

    public function getById($id) {
        $this->load(array('id=?',$id));
        return $this->query;
    }

    public function getByNumber($number) {
        $this->load(["numero = ?", $number]);
        return $this->query;
    }

    public function getByName($name) {
        $this->load(["nome like ?", "%".$name."%"]);
        return $this->query;
    }
}