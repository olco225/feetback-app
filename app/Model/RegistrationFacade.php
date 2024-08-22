<?php

namespace App\Model;

use Nette;

final class RegistrationFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }
    public function insertRegistrationData($data){
        $dbUser = $this->database->table("user")->where("username", $data->username)->fetch();

        
    }
    public function userExist($data): bool{
        $username = $data->username;
			//overenie či už existuje user
        $user = $this->database->table('user')
            ->where("username", $username)
            ->fetch();
        
        return $user != Null;
    }
    public function insertRegistrationDataHash($data){
        //Hashovanie
            $password = $data->password;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Vytvorenie nového záznamu v databáze
            $user = $this->database->table('user')->insert([
                "username" => $data->username,
                "password" => $hashedPassword,
                "email" => $data->email
            ]);
            
    }
}