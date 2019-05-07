<?php

namespace App\Controller;

class Play extends Base {

    /**
     *
     * @var \App\Objects\Form\Dice
     */
    protected $form;

    public function __construct() {

        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        }
        parent::__construct();

        /*
         * content
         */
        $this->form = new \App\Objects\Form\Dice();

        switch ($this->form->process()) {
            case \App\Objects\Form\Dice::STATUS_SUCCESS;
                $this->playSuccess();
                break;
        }

        $view = new \Core\Page\View([
            'title' => 'Spėk kurią bobutę išridensi',
        ]);
        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php') . $this->form->render();
    }

    public function playSuccess() {
        $safe_input = $this->form->getInput();
        $balance_repo = new \App\User\Repository(\App\App::$db_conn);
        $email = \App\App::$session->getUser()->getEmail();
        var_dump($email);
        $user_balance = $balance_repo->load($email)->getBalance();
        var_dump($user_balance);
        $rand_bobute = rand(1, 6);
        $bandymo_kaina = $safe_input['input'];
        $bandymas = $_POST['selection'];
        $win_koef = 2.5;

        if ($user_balance >= $bandymo_kaina) {
            if ($rand_bobute == $bandymas) {
                //laimejai 
                //i userio balance 
                //prideti 
                //bandymo kaina * koeficinetas
                $user = new \App\User\User([
                    'email' => $email,
                    'balance' => $user_balance + ($win_koef * $bandymo_kaina)
                ]);

                $balance_repo->update($user);
                print 'laimejai';
            } else {
                //praleimejai
                $user = new \App\User\User([
                    'email' => $email,
                    'balance' => $user_balance - $bandymo_kaina
                ]);

                $balance_repo->update($user);
                print 'pralaimejai';
            }
        } else {
            print 'neturi tiek pinigu kad galetum tiek statyti';
        }
    }

}
