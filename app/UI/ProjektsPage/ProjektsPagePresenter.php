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
        
        $user = $this->getUser();
        $userIdentity = $user->getIdentity();
        if($userIdentity){
            $userId = $userIdentity->getId();

            $this->template->userProjekts = $this->projektFacade->getUserProjekts($userId);

        }else{
            $this->template->setFile(__dir__ . "/../Error/Error4xx/403.latte");

        }

    }
    
}