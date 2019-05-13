<?php

namespace App\Controller;

class Logout extends Base {

    /**
     *
     * @var \App\Objects\Form\Logout
     */
    protected $form;

    public function __construct() {

        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        } else {
            parent::__construct();
            $this->form = new \App\Objects\Form\Logout();
            $this->form->process();   
            $this->page['content'] = $this->form->render();

            if (!empty($_POST)) {
                $safe_input = $this->form->getInput();

                if ($safe_input) {
                    \App\App::$session->logout();
                    header('Location: register');
                    exit();
                }
            }
        }
    }

}
