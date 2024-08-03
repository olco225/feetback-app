<?php

namespace App\Model;

use Nette;

final class FeetbackFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }
    public function addComent($projetkId){
        $this->database->table;
    }

}