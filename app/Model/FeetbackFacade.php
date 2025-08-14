<?php

namespace App\Model;

use Nette;

final class FeetbackFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){}
    //úpravy v db
    public function addFeetback($data){
        $this->database->query("Insert Into feetback", [
            "projekt_id" => $data["projekt_id"],
            "name" => "",
            "text" => $data["text"]
        ]);
    }
    public function updateCommentType($commentType, $commentId){
        $this->database->query("
        Update feetback
        Set type = ?
        Where id = ?", $commentType, $commentId);
    }
    //funckcia na získanie projektových dát podla projektId
    public function getComment($commentId){
        $commentData = $this->database->table("feetback")->where("id", $commentId)->fetch();
        return $commentData;
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