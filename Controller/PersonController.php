<?php


class PersonController
{



    public static function performLogin()
    {
        include 'C:\xampp\htdocs\AccessLogManager\models\PersonModel.php';
        $model = new PersonModel();
        $cpf = $_POST['cpf'];
        $password = $_POST['password'];

        $userLoggedIn = $model->login($cpf, $password);

        if ($userLoggedIn) {
            $_SESSION['user_id'] = $userLoggedIn;

            $model->recordLogin($userLoggedIn);

            header("Location: /KingdonOfCats");
        } else {
            echo "erro";
        }
    }

    public static function performLogOut()
    {

        include 'C:\xampp\htdocs\AccessLogManager\models\PersonModel.php';
        $model = new PersonModel();
        $personId = $_SESSION['user_id'];

        $model->recordLogout($personId);

        // Redirecionar para a página de logout ou outra página
        header("Location: /");
    }

    public static function index()
    {
        include 'C:\xampp\htdocs\AccessLogManager\models\PersonModel.php';

        $model = new PersonModel();

        $model->getAllRows();

        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\ShowPerson.php';
    }

    public static function indexCat()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\indexCat.php';
    }

    public static function kingdonOfCats()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Views\modules\Person\KingdonOfCats.php';
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
        header("Location: /list");
    }
}
