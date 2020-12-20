<?php

class UserController extends Controller {

    public function render() {
    
        $template = Template::instance();
        echo $template->render('Login.html');
    }

    public function auth() {

        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');
        $user = new User($this->db);
        $user->getByUsername($username);

        if($user->dry()) {
            $this->f3->set('SESSION.erro', '1');
            $this->f3->reroute('/login');
        }

        if(password_verify($password, $user->password)) {
            echo "Password OK";
        } else {
            $this->f3->set('SESSION.erro', 1);
            $this->f3->reroute('/login');
        }

    }
}