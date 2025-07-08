<?php

namespace App\Model;

use Nette;

final class FeetbackFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }
    public function addFeetback($data){
        $this->database->query("Insert Into feetback", [
            "projekt_id" => $data["projekt_id"],
            "text" => $data["text"]
        ]);
    }
    //funckcia na získanie projektových dát podla projektId
    public function getProjektData($projektId): array{
        $projektData = $database->table("projekt")->where("id", $projektId)->fetch();
        return $projektData;
    }

    public function getProjektComentars($projektId){
        return $this->database->table("feetback")->where("projekt_id", $projektId)->fetchAll();
    }
//časť pre spetnú vezbu s textFeetback
    //funckia na získanie otázky
    public function getProjektQuestion($projektId): string{
        $projektData = $this->database->table("projekt")->where("id", $projektId)->fetch();

        $projektQuestion = $projektData->question;
        return $projektQuestion;
    }

}