<?php
namespace App\Model ;
use Nette\Database\Explorer ;

use Nette\Security\Passwords;
use Nette\Security\Identity;
use Nette\Security\User;


final class SingInFacade {
    public function __construct(
        private Explorer $database,
        private Passwords $passwordsFunctions,
        private User $user,
    ){
    }
    public function getUser($username){
        $userData = $this->database->table("user")->where("username", $username)->fetch();
        return $userData;
    }
    public function singInUser($username, $password) :bool{
        //Prihlási užívatela, a vráti hodnotu true. Keď ho neprihláasi, vráti false
        $dbUserData = $this->getUser($username);

        if($dbUserData){
            if($this->passwordsFunctions->verify($password, $dbUserData->password)){
                //!! prihlásenie užívatela do nette, takže to budem môcť využívať v prezenteroch
                //vytvorenie identyty
                $identity = new Identity(
                    $dbUserData->id,
                    "non", // or array of roles
                    ['username' => $dbUserData->username],
                );
                //prihlásenie identyty
                $this->user->login($identity);
                return true;
            }

            return false;
        }

    }
}