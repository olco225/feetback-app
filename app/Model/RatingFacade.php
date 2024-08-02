<?php

namespace App\Model;

use Nette;

final class RatingFacade {
    public function __construct(
        private Nette\Database\Explorer $database,
    ){
    }

}