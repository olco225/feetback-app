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
        //nastavenie štýlov
        $this->template->currentCssPage = "projektsPage";
        
        //získanie a nahratie projektov užívatela
        //dáta prihláseného užívatela
        $user = $this->getUser();
        $userId = $user->getIdentity()->getId();
        // nahratie dát do presentera
        $this->template->userProjekts = $this->projektFacade->getUserProjekts($userId);

    }
    
}