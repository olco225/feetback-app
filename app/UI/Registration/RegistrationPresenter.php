<?php
namespace App\UI\Registration;
use Nette;
use App\Model\RegistrationFacade;
use Nette\Application\UI\Form;
final class RegistrationPresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private RegistrationFacade $registrationFacade,
    ){
    }
    public function createComponentRegistrationForm(): Form{
        $form = new Form;
        $form->addText("email", "Eamil:");

        $form->addText("username", "Username:")
        ->setRequired("usename must be");

        $form->addPassword("password", "Password:")
        ->setRequired("password must be");

        $form->addSubmit('send', 'Save and publish');

        $form->onSuccess[] = $this->registrationFormSucceeded(...);
        return $form;
    }
    private function registrationFormSucceeded(array $data): void{
        $this->registrationFacade->insertRegistrationData($data);
    }
}