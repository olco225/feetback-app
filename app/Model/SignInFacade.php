<?php
namespace App\Model ;
use Nette\Database\Explorer ;

final class SingInFacade {
    public function __construct(
        private Explorer $database,
    ){

    }
}