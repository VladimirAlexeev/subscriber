<?php

namespace src\Entity;

use DateTime;

class Email
{
    private $id;
    private $email;
    private $host;
    private $location;
    private $date;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        if (!$this->date instanceof DateTime) {
            return new DateTime($this->date);
        }

        return $this->date;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }
    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }
    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}