<?php

class IndexController extends Controller {

    public function render(\Base $f3) {
        $this->checkLogin($f3);

        $template = Template::instance();
        echo $template->render('Index.html');
    }

    public function search(\Base $f3, array $args = []) {
        $pesquisa = $f3->get('GET.pesquisa');
        $apartamento = new Apartamento($this->db);

        //Se a pesquisa for uma string
        if(is_string($pesquisa)) {
            $apartamento->getByName($pesquisa);
            $f3->set('apartamentos', null);
            $count = $apartamento->count(["nome like ?", "%".$pesquisa."%"]);
            for($i = 0; $i < $count; $i++) {
                $f3->push('apartamentos', $apartamento->cast());
                $apartamento->skip();
            }
            echo "<pre>";
            var_dump($f3->get('apartamentos'));
            echo "</pre>";
            
            
            
        } else if (is_integer($pesquisa)) {
            
        }
    }
}