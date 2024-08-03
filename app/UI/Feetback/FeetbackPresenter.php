<?php
namespace App\UI\Feetback;
use Nette;
use App\Model\FeetbackFacade;
use Nette\Application\UI\Form;
final class FeetbackPresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private Ratingfacade $ratingFacade,
    ){
    }
    public function createComponentRatingForm(): Form{
        $form = new Form;

        $form->addText("name", "Name:")
        ->setRequired("Title must be");

        $form->addTextArea("text", "What is your feedback?")
        ->setRequired("Title must be");

        $form->addSubmit('send', 'Send');
        
        

        $form->onSuccess[] = $this->ratingFormSucceeded(...);
        return $form;
    }
    private function ratingFormSucceeded(array $data): void{
        

    }
    public function renderRating($id): void{
        $this->template->parameter = $id;
        
    }
}