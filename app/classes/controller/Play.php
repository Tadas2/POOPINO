<?php

namespace App\Controller;

class Play extends Base {

    /**
     * @var \App\Objects\Form\Dice
     */
    protected $form;
    protected $message;

    public function __construct() {
        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        }
        parent::__construct();

        /** @var \App\Objects\Form\Dice Dice class */
        $this->form = new \App\Objects\Form\Dice();

        switch ($this->form->process()) {
            case \App\Objects\Form\Dice::STATUS_SUCCESS;
                $this->playSuccess();
                break;
        }

        $view = new \Core\Page\View([
            'title' => 'Bobutės ridenimo žaidimas',
            'balance' => 'Šiuo metu tavo balansas yra ' . $this->app_user->getBalance() . '$',
            'form' => $this->form->render(),
            'message' => $this->getMessage(),
            'class' => 'play'
        ]);
        
        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php');
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    public function playSuccess() {
        $safe_input = $this->form->getInput();
        $email = \App\App::$session->getUser()->getEmail();
        $user_balance = $this->app_user->getBalance();
        $rand_bobute = rand(1, 6);
        $bandymo_kaina = $safe_input['bobutes_input'];
        $bandymas = $safe_input['bobutes'];
        $win_koef = 2.5;
        $win_sum = $win_koef * $bandymo_kaina;

        if ($user_balance >= $bandymo_kaina) {
            if ($rand_bobute == $bandymas) {
                $this->app_user = new \App\User\User([
                    'email' => $email,
                    'balance' => $user_balance + ($win_sum)
                ]);

                $this->app_repo->update($this->app_user);
                $msg = 'Sveikinu! Laimėjai ' . $win_sum . '$';
                $this->setMessage($msg);
            } else {
                $this->app_user = new \App\User\User([
                    'email' => $email,
                    'balance' => $user_balance - $bandymo_kaina
                ]);

                $this->app_repo->update($this->app_user);
                $msg = 'Ups, nepasisekė';
                $this->setMessage($msg);
            }
        } else {
            $msg = 'Deja, statyti nori daugiau, nei turi pinigų...';
            $this->setMessage($msg);
        }
    }

}
