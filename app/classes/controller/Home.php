<?php

namespace App\Controller;

class Home extends Base {

    public function __construct() {
        parent::__construct();

        if (!\App\App::$session->isLoggedIn()) {
            header('Location: register');
            exit();
        } else {
            header('Location: play');
            exit();
        }

    }

}
