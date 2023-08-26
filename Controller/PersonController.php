<?php


class PersonController
{



    public static function performLogin()
    {
        include 'C:\xampp\htdocs\AccessLogManager\models\PersonModel.php';
        $model = new PersonModel();

        $cpf = $_POST['cpf'];
        $password = $_POST['password'];

        $personId = $model->login($cpf, $password);


        if ($personId) {
            // Registrar o tempo de entrada após o login bem-sucedido
            $model->recordLogin($personId);

            header("Location: /person"); // Redirecionar para a página de perfil ou outra página
        } else {
            echo "erro";
        }
    }

    public static function index()
    {
        include 'C:\xampp\htdocs\AccessLogManager\models\PersonModel.php';

        $model = new PersonModel();

        $persons = $model->getAllRows();
        $logs = $model->getAllLogs();

        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\ShowPerson.php';
    }

    public static function login()
    {

        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\Login.php';
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
        $model->setPhoneNumber($_POST['phoneNumber']);
        $model->setPassword($_POST['password']);

        $model->save();
        header("Location: /person");
    }
}
