<?php

namespace src\Controller;

use src\Repository\EmailRepository;

class EmailController
{
    private $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function getAllEmails()
    {
        return $this->emailRepository->all();
    }
}