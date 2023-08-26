<?php

define('HOST', 'localhost');
define('DATABASENAME', 'accesslog_db');
define('USER', 'root');
define('PASSWORD', '');



class PersonDAO

{
    protected $connection;

    public function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            $this->connection = new PDO('mysql:host=' . HOST . ';port=PORTA;dbname=' . DATABASENAME, USER, PASSWORD);
        } catch (PDOException $e) {

            echo "Error!" . $e->getMessage();
            (die);
        }
    }


    public function insert(PersonModel $model)
    {
        $sql = "INSERT INTO persons (cpf, email, name, password, phone, birthday) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $model->getCpf());
        $stmt->bindValue(2, $model->getEmail());
        $stmt->bindValue(3, $model->getName());
        $stmt->bindValue(4, $model->getPassword());
        $stmt->bindValue(5, $model->getPhoneNumber());
        $stmt->bindValue(6, $model->getBirthday());

        $stmt->execute();
    }



    public function update(PersonModel $model)
    {
    }

    public function select()
    {

        $sql = "SELECT * FROM persons";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
