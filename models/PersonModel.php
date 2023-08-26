<?php

class PersonModel

{

    public $rows;

    private $cpf,  $email,  $name,   $id,  $password,  $phoneNumber, $birthday;

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function save()
    {
        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';

        $dao = new PersonDAO();

        $dao->insert($this);
    }

    public function getAllRows()
    {

        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';

        $dao = new PersonDAO();


        $this->rows =  $dao->select();
    }

    public function login($cpf, $password)
    {

        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';
        $dao = new PersonDAO();

        return $dao->login($cpf, $password);
    }

    public function recordLogin($personId)
    {
        $entryTime = date("Y-m-d H:i:s"); // Captura a hora atual
        $exitTime = null; // Como é um login, a hora de saída ainda não foi registrada

        include 'C:\xampp\htdocs\AccessLogManager\DAO\AccessLogDAO.php';
        $accessLogDAO = new PersonDAO();

        $accessLogDAO->insertLog($personId, $entryTime, $exitTime);
    }

    public function recordLogout($personId)
    {
        $exitTime = date("Y-m-d H:i:s"); // Captura a hora atual

        include 'C:\xampp\htdocs\AccessLogManager\DAO\AccessLogDAO.php';
        $accessLogDAO = new PersonDAO();

        $accessLogDAO->updateExitTime($personId, $exitTime);
    }
}
