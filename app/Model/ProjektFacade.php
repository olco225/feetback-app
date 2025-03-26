<?php

namespace App\Model;

use Nette;

final class ProjektFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }
    public function projektsGet(){
        return $this->database->table("projekt")
        ->fetchAll();
    }
    public function getProjekt($projektId){
        return $this->database->table("projekt")->where("id", $projektId)->fetch();
    }
    public function updateProjekt($projektId, $data){
        $this->database->table("projekt")->where("id", $projektId)->update($data);
    }
    public function addProjekt($data){
        $this->database->table("projekt")->insert($data);
    }

    //user personalize function
    public function getUserProjekts($userId){
        //funckia na načítanie dát z db, !!!ale ešte nufunguje, gôly tomu že treba ešte dorobiť pár iných vecí
        return $this->database->table("projekt")->where("user_id", $userId)->fetchAll();
        //získanie dát z db podla user id
    }
    public function createUserProjekt($userProjektData): bool{
        //vloženie dát do db aj s user id
        $result = $this->database->table("projekt")->insert([
            "user_id" => $userProjektData["userId"] ,
            "title" => $userProjektData["title"],
            "question" => $userProjektData["question"]
        ]);
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function updateUserProjekt($userProjektData): bool{
        //urobeie premennej s id a odstránenie ho z posielacieho array
        $projektId = $userProjektData["id"];
        unset($userProjektData["id"]);

        $result = $this->database->table("projekt")->where("id", $projektId)->update($userProjektData);

        
        if($result){
            return true;
        }else{
            return false;
        }
    }
}