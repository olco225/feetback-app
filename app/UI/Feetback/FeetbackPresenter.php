<?php
namespace App\UI\Feetback;
use Nette;
use App\UI\BasePresenter;
use App\Model\FeetbackFacade;
use Nette\Application\UI\Form;
final class FeetbackPresenter extends BasePresenter{
    public function __construct(
        private FeetbackFacade $feetbackFacade,
    ){
    }
    public function createComponentRatingForm(): Form{
        $form = new Form;

        $form->addTextArea("text", "Tvoja správa:")->setHtmlAttribute("class", "inputs")->setHtmlAttribute("id", "textareaFeetback")
        ->setRequired("Spetná vezba musí byť.");

        $projektId = $this->getParameter("projektId");

        $form->addHidden("projekt_id", $projektId);

        $form->addSubmit('send', 'Odoslať')->setHtmlAttribute("class", "green-button");
        
        

        $form->onSuccess[] = $this->ratingFormSucceeded(...);
        return $form;
    }
    private function ratingFormSucceeded(array $data): void{
        $this->feetbackFacade->addFeetback($data);
        $this->redirect("Home:");
    }
    //render pre local testing
    public function renderFeetback($id): void{
        $this->template->currentCssPage = "feetback";

        //načítanie otázky
        $projektId = $this->getParameter("projektId");
        if($projektId){
            $projektQuestion = $this->feetbackFacade->getProjektQuestion($projektId);
        }else{
            $projektQuestion = $this->feetbackFacade->getProjektQuestion($id);
        }
        

        $this->template->projektQuestion = $projektQuestion;

        
        
    }
}