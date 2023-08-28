<?php



class PersonController
{


    public static function performLogin()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Models\PersonModel.php';
        $model = new PersonModel();
        $cpf = $_POST['cpf'];
        $password = $_POST['password'];

        try {
            $userLoggedIn = $model->login($cpf, $password);
            if ($userLoggedIn) {
                $_SESSION['authenticated'] = true;
                $_SESSION['user_id'] = $userLoggedIn;

                $model->recordLogin($userLoggedIn);

                header("Location: /KingdonOfCats");
            } else {
                echo "erro";
            }
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function performLogOut()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Models\PersonModel.php';
        $model = new PersonModel();
        $personId = $_SESSION['user_id'];

        try {
            $model->recordLogout($personId);
            session_unset();
            session_destroy();
            header("Location: /");
        } catch (Exception $e) {
            echo "Erro ao fazer logout: " . $e->getMessage();
        }
    }

    public static function index()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Models\PersonModel.php';

        $model = new PersonModel();

        $model->getAllRows();

        include 'C:\xampp\htdocs\AccessLogManager\Views\TablePersons.php';
    }

    public static function indexCat()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Views\indexCat.php';
    }

    public static function kingdonOfCats()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Views\KingdonOfCats.php';
    }

    public static function login()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Views\Login.php';
    }

    public static function form()
    {

        include 'C:\xampp\htdocs\AccessLogManager\Views\TablePersons.php';
    }

    public static function save()
    {
        include 'C:\xampp\htdocs\AccessLogManager\Models\PersonModel.php';
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
