<?php
include 'Controller/PersonController.php';
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($url) {
    case '/';

        echo "pagina inicial";


        break;

    case '/person':

        PersonController::index();

        break;

    case '/person/login':

        PersonController::login();

        break;

    case '/form':
        PersonController::form();

        break;

    case '/person/form/save':
        PersonController::save();

        break;

    case '/person/login/confirmation':
        PersonController::performLogin();
        break;

    case '/index':

        break;

    default:
        echo "Erro 404";
        break;
}
