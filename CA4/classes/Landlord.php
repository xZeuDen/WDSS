<?php

class Landlord
{
    private $landlordID;
    private $landlordFirstName;
    private $landlordLastName;
    private $landlordEmail;
    private $landlordPhone;
    private $landlordPassword;

    public function __construct()
    {
    }

    // Getters
    public function getLandlordID()
    {
        return $this->landlordID;
    }

    public function getLandlordFirstName()
    {
        return $this->landlordFirstName;
    }

    public function getLandlordLastName()
    {
        return $this->landlordLastName;
    }

    public function getLandlordEmail()
    {
        return $this->landlordEmail;
    }

    public function getLandlordPhone()
    {
        return $this->landlordPhone;
    }

    public function getLandlordPassword()
    {
        return $this->landlordPassword;
    }

    // Setters
    public function setLandlordID($landlordID)
    {
        $this->landlordID = $landlordID;
    }

    public function setLandlordFirstName($landlordFirstName)
    {
        $this->landlordFirstName = $landlordFirstName;
    }

    public function setLandlordLastName($landlordLastName)
    {
        $this->landlordLastName = $landlordLastName;
    }

    public function setLandlordEmail($landlordEmail)
    {
        $this->landlordEmail = $landlordEmail;
    }

    public function setLandlordPhone($landlordPhone)
    {
        $this->landlordPhone = $landlordPhone;
    }

    public function setLandlordPassword($landlordPassword)
    {
        $this->landlordPassword = $landlordPassword;
    }
}

?>
