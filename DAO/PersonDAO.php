<?php

define('HOST', 'localhost');
define('DATABASENAME', 'accesslog_db');
define('USER', 'root');
define('PASSWORD', '');



class AccessLogDAO

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
    public function insertLog($personId, $entryTime)
    {
        $sql = "UPDATE persons SET entry_time = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $entryTime);
        $stmt->bindValue(2, $personId);;
        $stmt->execute();
    }

    public function insertOrUpdateLog($personId, $entryTime, $exitTime)
    {
        $existingEntry = $this->getExistingEntry($personId);

        if ($existingEntry) {
            $this->updateExitTime($existingEntry['id'], $exitTime);
        } else {
            $this->insertLog($personId, $entryTime);
        }
    }
    public function getExistingEntry($personId)
    {
        $sql = "SELECT * FROM access_logs WHERE person_id = ? AND exit_time IS NULL";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(1, $personId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateExitTime($personId, $exitTime)
    {

        $sql = "UPDATE access_logs SET exit_time = ? WHERE person_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $exitTime);
        $stmt->bindValue(2, $personId);


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

    public function login($cpf, $password)
    {
        $sql = "SELECT id FROM persons WHERE cpf = ? AND password = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$cpf, $password]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['id'];
        } else {
            return false;
        }
    }
}
