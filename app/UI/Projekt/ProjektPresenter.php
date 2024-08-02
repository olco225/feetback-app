<?php
namespace App\UI\Projekt;
use Nette;
use App\Model\ProjektFacade;
final class ProjektPresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private ProjektFacade $projektFacade,
    ){
    }
    public function renderProjekt($projektId): void{
        $this->template->projekt = $this->projektFacade->getProjekt($projektId);
    }
}