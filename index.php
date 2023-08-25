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

    case '/form':
        PersonController::form();

        break;

    case '/person/form/save':
        PersonController::save();

        break;

    default:
        echo "Erro 404";
        break;
}
