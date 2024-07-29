<?php

namespace App\Model;

use Nette;

final class RegistrationFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }
    
}