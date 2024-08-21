<?php
namespace App\UI\ProjektsPage;
use Nette;
use App\UI\BasePresenter;
use App\Model\ProjektFacade;
final class ProjektsPagePresenter extends BasePresenter{
    public function __construct(
        private ProjektFacade $projektFacade,
    ){
    }
    public function renderProjektsPage(): void{
        $this->template->projekts = $this->projektFacade->projektsGet();
    }
}