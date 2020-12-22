<?php

class LoginController extends Controller {

    public function render(\Base $f3) {
    
        $template = Template::instance();
        echo $template->render('Login.html');
        $f3->clear('SESSION.erro');
    }

    public function auth(\Base $f3) {

        $username = $f3->get('POST.username');
        $password = $f3->get('POST.password');
        $user = new User($this->db);
        $user->getByUsername($username);

        if($user->dry()) {
            $f3->set('SESSION.erro', '1');
            $f3->reroute('/login');
        }

        if(password_verify($password, $user->password)) {
            $f3->set('SESSION.logged', true , 86400);
            $f3->set('SESSION.username', $username);
            $f3->reroute('/index');
        } else {
            $f3->set('SESSION.erro', 1);
            $f3->reroute('/login');
        }

    }

    public function logout(\Base $f3) {
        $f3->clear('SESSION.username');
        $f3->reroute('login');
    }
}