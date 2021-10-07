<?php
return [
    //Routes
    'subscriber' => 'subscriber/index',
    'subscriber/emails' => 'email/getAllEmails', // use action list in EmailController

    // Params
    'host' => 'email/getAllEmailsByHost' // use action list in EmailController
];