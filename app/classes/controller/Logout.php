<?php

namespace App\Controller;

class Logout extends Base {

    public function __construct() {

       

        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        } else {
            parent::__construct();

            $form = new \App\Objects\Form\Logout();
            $form->process();
            $this->page['content'] = $form->render();
            
            if (!empty($_POST)) {
                $safe_input = get_safe_input($form);
                $form_success = validate_form($safe_input, $form);
                if ($form_success) {
                    $form = new \App\Objects\Form\Login();
                    $form->process();
                    $this->page['content'] = $form->render();
                    \App\App::$session->logout();
                }
            }
        }
    }

}
