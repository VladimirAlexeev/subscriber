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
        $sql = 'SELECT * FROM emails';
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
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