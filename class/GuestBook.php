<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 27/03/2019
 * Time: 12:23
 */
require_once 'Message.php';
class GuestBook
{
    private $file;


    public function __construct(string $file)
    {

        $directory = dirname($file); //On récupère le nom du dossier
        if(!is_dir($directory)) // Si ce n'est pas un dossier
        {
            mkdir($directory, 0777, true); // On crée le dossier
        }
        if (!file_exists($file)){ //On vérifie si le dossier existe
            touch($file); // sinon on le crée
        }
        $this->file = $file;
    }

    public function addMessage(Message $message) : void
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL , FILE_APPEND);
    }

    public function getMessages(): array
    {
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL, $content);
        $messages = [];
        foreach ($lines as $line) {
            $messages[] = Message::fromJSON($line);
        }
        return array_reverse($messages);

    }
}