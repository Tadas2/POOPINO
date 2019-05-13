<?php

namespace App\Controller;

class Register extends Base {

    /**
     *
     * @var \App\Objects\Form\Register
     */
    protected $form;
    protected $message;

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
        $view_content = [
            'title' => 'Registracija',
            'class' => 'register'
        ];

        switch ($this->form->process()) {
            case \App\Objects\Form\Register::STATUS_SUCCESS:
                $this->registerSuccess();
                $view_content['message'] = $this->getMessage();
                break;

            default:
                $view_content['form'] = $this->form->render();
        }

        $view = new \Core\Page\View($view_content);
        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php');
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
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

        $balance_user = new \App\User\User([
            'email' => $safe_input['email'],
            'balance' => rand(10, 50),
        ]);

        $this->app_repo->insert($balance_user);
        \App\App::$user_repo->insert($user);
        $msg = 'Už registraciją gavai dovanų ' . $balance_user->getBalance() . '$';
        $this->setMessage($msg);
    }

}
