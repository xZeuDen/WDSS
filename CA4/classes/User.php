<?php
namespace classes;

class User
{
    private $userID;
    private $userFirstName;
    private $userLastName;
    private $userPhoneNumber;
    private $userEmail;
    private $userPassword;

    public function __construct()
    {
    }

    // Getters
    public function getUserID()
    {
        return $this->userID;
    }

    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    public function getUserLastName()
    {
        return $this->userLastName;
    }

    public function getUserPhoneNumber()
    {
        return $this->userPhoneNumber;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    // Setters
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;
    }

    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;
    }

    public function setUserPhoneNumber($userPhoneNumber)
    {
        $this->userPhoneNumber = $userPhoneNumber;
    }

    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }
}

?>
