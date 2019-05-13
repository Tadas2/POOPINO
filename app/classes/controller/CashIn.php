<?php

namespace App\Controller;

class CashIn extends Base {

    /**
     * @var \App\Objects\Form\CashIn
     */
    protected $form;

    public function __construct() {
        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        }
        parent::__construct();

        /** @var \App\Objects\Form\CashIn CashIn class */
        $this->form = new \App\Objects\Form\CashIn();

        switch ($this->form->process()) {
            case \App\Objects\Form\CashIn::STATUS_SUCCESS;
                $this->inputSuccess();              
                break;
        }

        $view = new \Core\Page\View([
            'title' => 'Welcome to Cash-in',
            'balance' => 'Tavo balansas ' . $this->app_user->getBalance() . '$',
            'class' => 'cashin'
        ]);

        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php') . $this->form->render();
    }

    public function inputSuccess() {
        $safe_input = $this->form->getInput();
        $email = \App\App::$session->getUser()->getEmail();

        $current_balance = $this->app_user->getBalance();
        $this->app_user->setBalance($safe_input['balance'] + $current_balance);       
        $this->app_repo->update($this->app_user);
    }

}
