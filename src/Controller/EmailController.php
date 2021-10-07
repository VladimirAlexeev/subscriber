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
         $emailList = $this->emailRepository->all();
         require_once(ROOT.'/src/template/views/admin/index.php');

         return true;
    }

    public function getAllEmailsByHost(string $host)
    {
        $emailList = $this->emailRepository->byEmailsByHost($host);

        require_once(ROOT.'/src/template/views/admin/index.php');

        return true;
    }
}