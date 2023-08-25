<?php


class PersonController
{

    public static function index()
    {

        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\ShowPerson.php';
    }

    public static function form()
    {

        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\FormPerson.php';
    }

    public static function save()
    {
        include 'C:\xampp\htdocs\AccessLogManager\models\PersonModel.php';
        $model = new PersonModel();
        $model->setName($_POST['name']);
        $model->setEmail($_POST['email']);
        $model->setBirthday($_POST['birthday']);
        $model->setCpf($_POST['cpf']);
        $model->setPassword($_POST['password']);

        $model->save();
        header("Location: /person");
    }
}
