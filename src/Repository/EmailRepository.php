<?php

namespace src\Repository;

use PDO;
use src\Entity\Email;

class EmailRepository
{
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all()
    {
        $emailList = [];
        $sql = 'SELECT * FROM emails';
        $statement = $this->db->prepare($sql);
        $statement->execute();

        $i = 0;

        while ($row = $statement->fetch()) {
            $emailList[$i]['id'] = $row['id'];
            $emailList[$i]['email'] = $row['email'];
            $emailList[$i]['host'] = $row['host'];
            $emailList[$i]['location'] = $row['location'];
            $emailList[$i]['date'] = $row['date'];

            $i++;
        }

        return $emailList;
    }

    public function byEmailsByHost($host)
    {
        $sql = "SELECT * FROM emails WHERE host='$host'";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        $i = 0;

        while ($row = $statement->fetch()) {
            $emailList[$i]['id'] = $row['id'];
            $emailList[$i]['email'] = $row['email'];
            $emailList[$i]['host'] = $row['host'];
            $emailList[$i]['location'] = $row['location'];
            $emailList[$i]['date'] = $row['date'];

            $i++;
        }

        return $emailList;

//        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findEmail($email)
    {
        $sql = "SELECT COUNT(*) FROM emails WHERE email ='$email'";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        if ($statement->fetchColumn()) {
            return true;
        }

        return  false;
    }

    public function saveEmail($email, $host, $location)
    {
        $sql = "INSERT INTO `emails`(`email`, `host`, `location`) VALUES (:email, :host, :location)";

        $result = $this->db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':host', $host, PDO::PARAM_STR);
        $result->bindParam(':location', $location, PDO::PARAM_STR);

        $result->execute();
    }

    private function buildColumns(Email $email, array $additional = [])
    {
        return array_merge([
           'email' => $email->getEmail(),
           'host' => $email->getHost(),
           'location' => $email->getLocation(),
            'date' => $email->getDate()->format('Y-m-d')
        ], $additional);
    }
}