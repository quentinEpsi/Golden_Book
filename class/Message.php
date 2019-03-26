<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 26/03/2019
 * Time: 22:50
 */

class Message
{
    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private $username;
    private $message;


    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
    }

    public function isValid() : bool
    {
        return empty($this->getErrors());
    }

    public function getErrors() : array
    {
        //J'instancie mon tableau
        $errors = [];
        if (strlen($this->username) < self::LIMIT_USERNAME ) {
            //Je rajoute une clé 'username' au tableau
            $errors['username'] = 'Votre pseudo est trop court';
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE ) {
            $errors['message'] = 'Votre message est trop court';
        }
        return $errors;
    }
}