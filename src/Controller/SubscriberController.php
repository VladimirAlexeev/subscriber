<?php

namespace src\Controller;

use DateTime;
use src\Repository\EmailRepository;

class SubscriberController
{
    private $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function index()
    {
        $email = '';
        $result = false;
        if (isset($_POST['submit']) && $_POST['email']) {
            $email = $_POST['email'];
            if (self::isEmailValid($email) && !$this->checkEmailExists($email)) {
                $this->saveSubscriber($email);
            }
        }

        require_once(ROOT.'/src/template/views/subscriber/index.php');

        return true;
    }

    private static function isEmailValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    private function checkEmailExists($email)
    {
        return $this->emailRepository->findEmail($email);
    }

    private function saveSubscriber($email)
    {
        $domain = explode('@', $email);
        $domain = explode('.', $domain[1]);
        $host = $domain[0];
        $location = count($domain) > 3 ? $domain[2] : $domain[1];
        $date = date('Y-m-d H:i:s');

        $this->emailRepository->saveEmail($email, $host, $location);
    }
}