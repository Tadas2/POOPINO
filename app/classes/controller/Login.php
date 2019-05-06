<?php

namespace App\Controller;

class Login extends Base {

    public function __construct() {

        if (\App\App::$session->isLoggedIn()) {
            header('Location: play');
            exit();
        }
        parent::__construct();
        /*
         * content
         */
        $form = new \App\Objects\Form\Login();
        $form->process();
        $this->page['content'] = $form->render();
    }

}

