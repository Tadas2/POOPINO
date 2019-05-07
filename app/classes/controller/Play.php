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
            'title' => 'PAZAISKIME',
        ]);
        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php') . $this->form->render();
    }

    public function playSuccess() {
         $safe_input = $this->form->getInput();
         var_dump($safe_input);
         var_dump($safe_input['input']);
        if (isset($_POST['submit'])) {
            if (isset($_POST['radio'])) {
                echo "You have selected :" . $_POST['radio']; 
            }
        }
    }
}