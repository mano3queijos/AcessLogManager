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

        $dao = new AccessLogDAO();

        $dao->insert($this);
    }

    public function getAllRows()
    {

        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';

        $dao = new AccessLogDAO();

        return  $dao->select();
    }
    public function getAllLogs()
    {

        $logDao = new AccessLogDAO();

        return $logDao->getAllRowsWithLastEntry();
    }

    public function login($cpf, $password)
    {

        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';
        $dao = new AccessLogDAO();

        return $dao->login($cpf, $password);
    }

    public function recordLogin($personId)
    {
        $entryTime = date("Y-m-d H:i:s");
        $exitTime = null;

        $accessLogDAO = new AccessLogDAO();

        $accessLogDAO->insertLog($personId, $entryTime, $exitTime);
    }

    public function recordLogout($personId)
    {
        $exitTime = date("Y-m-d H:i:s");

        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';
        $accessLogDAO = new AccessLogDAO();

        $accessLogDAO->updateExitTime($personId, $exitTime);
    }
}
