<?php

namespace App\Controller;

class Register extends Base {

    /**
     *
     * @var \App\Objects\Form\Register
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
        $this->form = new \App\Objects\Form\Register();

        switch ($this->form->process()) {
            case \App\Objects\Form\Register::STATUS_SUCCESS:
                $this->registerSuccess();
                break;
        }
    
        $this->page['content'] = $this->form->render();
    }

    public function registerSuccess() {
        $safe_input = $this->form->getInput();

        $user = new \Core\User\User([
            'email' => $safe_input['email'],
            'full_name' => $safe_input['full_name'],
            'age' => $safe_input['age'],
            'gender' => $safe_input['gender'],
            'orientation' => $safe_input['orientation'],
            'photo' => $safe_input['photo'],
            'password' => $safe_input['password'],
            'account_type' => \Core\User\User::ACCOUNT_TYPE_USER,
            'is_active' => true
        ]);

        \App\App::$user_repo->insert($user);
    }

}
