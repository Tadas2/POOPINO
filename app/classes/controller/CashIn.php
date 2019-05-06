<?php

namespace App\Controller;

class CashIn extends Base {

    /**
     *
     * @var \App\Objects\Form\CashIn
     */
    protected $form;

    public function __construct() {
        parent::__construct();

        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        }
        /*
         * content
         */
        $this->form = new \App\Objects\Form\CashIn();

        switch ($this->form->process()) {
            case \App\Objects\Form\CashIn::STATUS_SUCCESS:
                $this->inputSuccess();
                break;
        }

        $repo = new \App\User\Repository(\App\App::$db_conn);
        $balance = $repo->load(\App\App::$session->getUser()->getEmail())->getBalance();

        $view = new \Core\Page\View([
            'title' => 'Welcome to Cash-in',
            'subtitle' => 'balansas ' . $balance . '$'
        ]);

        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php') . $this->form->render();
    }

    public function inputSuccess() {
        $safe_input = $this->form->getInput();
        $balance_repo = new \App\User\Repository(\App\App::$db_conn);
        $email = \App\App::$session->getUser()->getEmail();

        if ($balance_repo->load($email)) {
            $input_user = new \App\User\User([
                'email' => $email,
                'balance' => $safe_input['balance'] + $balance_repo->load($email)->getBalance(),
            ]);

            $balance_repo->update($input_user);
        } else {
            $input_user = new \App\User\User([
                'email' => $email,
                'balance' => $safe_input['balance'],
            ]);

            $balance_repo->insert($input_user);
        }
    }

}
