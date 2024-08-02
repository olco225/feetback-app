<?php
namespace App\UI\Rating;
use Nette;
use App\Model\RatingFacade;
use Nette\Application\UI\Form;
final class RatingPresenter extends Nette\Application\UI\Presenter{
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
    public function renderRating(): void{

        
    }
}