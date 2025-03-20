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
    public function getUserProjetks($userId){
        //získanie dát z db podla user id
    }
}