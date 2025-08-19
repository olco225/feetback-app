<?php
namespace App\UI\Projekt;
use Nette;
use App\UI\BasePresenter;
use App\Model\ProjektFacade;
use App\Model\FeetbackFacade;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Form;
final class ProjektPresenter extends BasePresenter{
    public function __construct(
        private ProjektFacade $projektFacade,
        private FeetbackFacade $feetbackFacade,
    ){
    }
    public function renderProjekt($projektId): void{
        //nastavenie štýlov
        $this->template->currentCssPage = "projekt";

        //overenie či je užívatel prihlásený, a má k tomuto prístup
        //Keď nieje hádže to error
        $user = $this->getUser();
        $userIdentity = $user->getIdentity();
        if($userIdentity){
            $userId = $userIdentity->getId();
            $projektData = $this->projektFacade->getProjekt($projektId);

            if($userId == $projektData->user_id){
                $this->template->projekt = $projektData;
                $this->template->commentars = $this->feetbackFacade->getProjektcomentars($projektId);
            }else{
                $this->template->setFile(__dir__ . "/../Error/Error4xx/403.latte");
            }
        }else{
            $this->template->setFile(__dir__ . "/../Error/Error4xx/403.latte");

        }
        

        
        

    }
    public function createComponentCommentTypeForm(): Multiplier{
        return new Multiplier(function($commentId){
            $form = new Form;
            
            $commentData = $this->feetbackFacade->getComment($commentId);
            $commentTypes = [
                "none" => "none",
                "hate" => "hate"
            ];
            $form->addHidden("commentId", $commentId);
            $form->addSelect("commentType", "Typ comentára:", $commentTypes)->setHtmlAttribute("class", "inputs");
            $form->addSubmit("submit", "Uložiť typ komentu")->setHtmlAttribute("class", "buttons");

            if($commentData){
                $form->setDefaults([
                    "commentType" => $commentData->type,
                ]);
            }
            $form->onSuccess[] = [$this, "createCommentTypeSucceeded"];
            return $form;
        });
        
    }
    public function createCommentTypeSucceeded(Form $form, $data){
        //kod na uloženie dát do db
        $this->feetbackFacade->updateCommentType($data->commentType, $data->commentId);
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