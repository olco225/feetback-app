<?php
namespace App\UI\ProjektsPage;
use Nette;
use App\Model\ProjektFacade;
final class ProjektsPagePresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private ProjektFacade $projektFacade,
    ){
    }
    public function renderProjektsPage(): void{
        $this->template->projekts = $this->projektFacade->projektsGet();
    }
}