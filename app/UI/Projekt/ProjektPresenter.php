<?php
namespace App\UI\Projekt;
use Nette;
use App\Model\ProjektFacade;
use App\Model\FeetbackFacade;
final class ProjektPresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private ProjektFacade $projektFacade,
        private FeetbackFacade $feetbackFacade,
    ){
    }
    public function renderProjekt($projektId): void{
        $this->template->projekt = $this->projektFacade->getProjekt($projektId);
        $this->template->comentars = $this->feetbackFacade->getProjektcomentars($projektId);

    }
}