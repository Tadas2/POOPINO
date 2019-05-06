<?php

namespace App\Controller;

class Play extends Base {

    public function __construct() {

        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        }
        parent::__construct();

        /*
         * content
         */
        $view = new \Core\Page\View([
            'title' => 'Welcome to Cash-in',
        ]);
        $this->page['content'] = $view->render(ROOT_DIR . '/App/views/content.tpl.php');
    }

}
