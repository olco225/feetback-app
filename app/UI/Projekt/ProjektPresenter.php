<?php
namespace App\UI\Projekt;
use Nette;
use App\UI\BasePresenter;
use App\Model\ProjektFacade;
use App\Model\FeetbackFacade;
final class ProjektPresenter extends BasePresenter{
    public function __construct(
        private ProjektFacade $projektFacade,
        private FeetbackFacade $feetbackFacade,
    ){
    }
    public function renderProjekt($projektId): void{
        //nastavenie štýlov
        $this->template->currentCssPage = "projekt";

        $this->template->projekt = $this->projektFacade->getProjekt($projektId);
        $this->template->comentars = $this->feetbackFacade->getProjektcomentars($projektId);

    }
    public function actionDeletProjekt($projektId){
        $projektWasDeleted = $this->projektFacade->deletUserProjekt($projektId);
        if($projektWasDeleted){
            $this->flashMessage("Projekt bol úspešne vymazaný");
            $this->redirect("ProjektsPage:ProjektsPage");

        }else{
            $this->flashMessage("Nastala nejaká chyba.");
            $this->redirect("ProjektsPage:ProjektsPage");
        }
    }
}