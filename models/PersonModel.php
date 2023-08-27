<?php

class PersonModel

{

    public $rows;

    private $cpf,  $email,  $name,   $id,  $password,  $phoneNumber, $birthday, $entryTime, $exitTime;

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



    public function getEntryTime()
    {
        return $this->entryTime;
    }

    public function setEntryTime($entryTime)
    {
        $this->entryTime = $entryTime;
    }

    public function getExitTime()
    {
        return $this->exitTime;
    }

    public function setExitTime($exitTime)
    {
        $this->exitTime = $exitTime;
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

        $this->rows = $dao->select();
    }

    public function login($cpf, $password)
    {

        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';
        $dao = new AccessLogDAO();

        return $dao->login($cpf, $password);
    }


    public function recordLogin($personId)
    {

        $accessLogDAO = new AccessLogDAO();

        if (!$accessLogDAO->hasUnfinishedEntry($personId)) {
            $entryTime = date("Y-m-d H:i:s");
            $accessLogDAO->insertLog($personId, $entryTime);
        } else {
            throw new Exception("Não é possível registrar entrada. Saída anterior pendente.");
        }
    }



    public function recordLogout($personId)
    {
        include 'C:\xampp\htdocs\AccessLogManager\DAO\PersonDAO.php';

        $accessLogDAO = new AccessLogDAO();

        if (!$accessLogDAO->hasUnfinishedExit($personId)) {
            $exitTime = date("Y-m-d H:i:s");
            $accessLogDAO->updateExitTime($personId, $exitTime);
        } else {
            throw new Exception("Não é possível registrar saída. Nenhuma entrada correspondente encontrada.");
        }
    }
}
