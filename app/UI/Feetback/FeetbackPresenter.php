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

        $form->addText("name", "Name:")
        ->setRequired("Title must be");

        $form->addTextArea("text", "What is your feedback?")
        ->setRequired("Title must be");

        $projektId = $this->getParameter("projektId");

        $form->addHidden("projekt_id", $projektId);

        $form->addSubmit('send', 'Send');
        
        

        $form->onSuccess[] = $this->ratingFormSucceeded(...);
        return $form;
    }
    private function ratingFormSucceeded(array $data): void{
        $this->feetbackFacade->addFeetback($data);
        $this->redirect("Home:");
    }
    public function renderFeetback($id): void{
        $this->template->parameter = $id;

        
        
    }
}