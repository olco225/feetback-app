<?php
namespace App\UI\Projekt;
use Nette;
use App\Model\ProjektFacade;
final class ProjektPresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private ProjektFacade $projektFacade,
    ){
    }
    public function renderProjekt(): void{
        $this->template->projekts = $this->projektFacade->projektGet();
    }
}