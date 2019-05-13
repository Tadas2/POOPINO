<?php

namespace App\Controller;

class Base extends \Core\Page\Controller {

    protected $nav;
    protected $app_repo;
    protected $app_user;

    public function __construct() {
        parent::__construct();
        $this->page['stylesheets'][] = 'css/style.css';
        $this->page['stylesheets'][] = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css";
        $this->page['scripts']['body_end'][] = "https://code.jquery.com/jquery-3.3.1.slim.min.js";
        $this->page['scripts']['body_end'][] = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js";
        $this->page['scripts']['body_end'][] = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js";


        /** @var \App\User\Repository User balance repository */
        $this->app_repo = new \App\User\Repository(\App\App::$db_conn);

        /** @var \App\View\Navigation Navigation class */
        $this->nav = new \App\View\Navigation();

        if (!\App\App::$session->isLoggedIn()) {
            $this->nav->addLink('register', 'Register');
            $this->nav->addLink('login', 'Login');
        } else {
            $this->app_user = $this->app_repo->load(\App\App::$session->getUser()->getEmail());
            $this->nav->addLink('play', 'Play');
            $this->nav->addLink('cashin', 'Cashin');
            $this->nav->addLink('logout', 'Logout');
        }
    }

    public function onRender() {
        $this->page['footer'] = (new \App\View\Footer([
            'title' => '©RutaTadas2019',
        ]))->render();     
        
        if ($this->app_user) {
            $this->nav->setUser(\App\App::$session->getUser()->getFullName(), $this->app_user->getBalance());
        }
        $this->page['header'] = $this->nav->render();

        return (new \Core\Page\View($this->page))->render(ROOT_DIR . '/core/views/layout.tpl.php');
    }

}
