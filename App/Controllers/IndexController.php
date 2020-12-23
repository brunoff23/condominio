<?php

class IndexController extends Controller {

    public function render(\Base $f3) {
        $this->checkLogin($f3);

        $template = Template::instance();
        echo $template->render('Index.html');
    }

    public function search(\Base $f3) {
        $pesquisa = $f3->get('GET.pesquisa');
        $apartamento = new Apartamento($this->db);

        //Se a pesquisa for uma string
        if(preg_match('/[a-zA-Z]/', $pesquisa)) {

            $dados = $apartamento->getByName($pesquisa);
            $f3->set('apartamentos', $dados);
            
            $template = Template::instance();
            echo $template->render('Index.html');

        //Se a pesquisa for um integer
        } else if(preg_match('/[0-9]/', $pesquisa)) {

            $dados = $apartamento->getByNumber($pesquisa);
            $f3->set('apartamentos', $dados);
            
            $template = Template::instance();
            echo $template->render('Index.html');
        }
    }
}