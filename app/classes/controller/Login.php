<?php

namespace App\Controller;

class Login extends Base {

    /**
     *
     * @var \App\Objects\Form\Login
     */
    protected $form;

    public function __construct() {

        if (\App\App::$session->isLoggedIn()) {
            header('Location: play');
            exit();
        }
        parent::__construct();
        /*
         * content
         */
        $this->form = new \App\Objects\Form\Login();

        switch ($this->form->process()) {
            case \App\Objects\Form\Login::STATUS_SUCCESS:
                header('Location: play');
                exit();
                break;
        }

        $this->page['content'] = $this->form->render();
    }

}
