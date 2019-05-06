<?php
\Core\Page\Router::addRoute('/', '\App\Controller\Home');
\Core\Page\Router::addRoute('/cashin', '\App\Controller\CashIn');
\Core\Page\Router::addRoute('/play', '\App\Controller\Play');
\Core\Page\Router::addRoute('/register', '\App\Controller\Register');
\Core\Page\Router::addRoute('/login', '\App\Controller\Login');
\Core\Page\Router::addRoute('/logout', '\App\Controller\Logout');