<?php

namespace App\Model;

use Nette;

final class ProjektFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }
    public function projektGet(){
        return $this->database->table("projekt")
        ->where("id", "2")
        ->fetchAll();
    }
}