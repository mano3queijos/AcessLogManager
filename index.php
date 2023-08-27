<?php
session_start();

include 'Controller/PersonController.php';
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($url) {


    case '/list':

        PersonController::index();

        break;

    case '/login':

        PersonController::login();

        break;

    case '/form':
        PersonController::form();

        break;

    case '/form/save':
        PersonController::save();

        break;

    case '/login/confirmation':
        PersonController::performLogin();
        break;
    case '/exit/confirmation':
        PersonController::performLogOut();
        break;

    case '/':
        PersonController::indexCat();
        break;

    case '/KingdonOfCats':
        PersonController::kingdonOfCats();
        break;

    default:
        echo "Erro 404";
        break;
}
