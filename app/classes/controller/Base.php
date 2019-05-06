<?php

namespace App\Controller;

class Base extends \Core\Page\Controller {

    public function __construct() {
        parent::__construct();

        /*
         * Nav
         */

        if (!\App\App::$session->isLoggedIn()) {

            $nav = new \App\View\Navigation([
                [
                    'link' => 'register',
                    'title' => 'Register'
                ],
                [
                    'link' => 'login',
                    'title' => 'Login'
                ],
            ]);
        } else {
            $nav = new \App\View\Navigation([
                [
                    'link' => 'play',
                    'title' => 'Play'
                ],
                [
                    'link' => 'cashin',
                    'title' => 'Cash-In'
                ],
                [
                    'link' => 'logout',
                    'title' => 'Logout'
                ],
            ]);
        }

        $this->page['header'] = $nav->render();




        /*
         * Footer
         */
        $foot = new \App\View\Footer([
            'title' => '©RutaTadas2019',
        ]);

        $this->page['footer'] = $foot->render();
    }

}
