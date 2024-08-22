<?php
namespace App\UI\Registration;
use Nette;
use App\UI\BasePresenter;
use App\Model\RegistrationFacade;
use Nette\Application\UI\Form;
final class RegistrationPresenter extends BasePresenter{
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
    private function registrationFormSucceeded(Form $form, \stdClass $data): void{
			$userExist = $this->registrationFacade->userExist($data);
			if($userExist == False)
			{
				$this->registrationFacade->insertRegistrationDataHash($data);
				$this->flashMessage('Registration successful.', 'success');
            	$this->redirect('Home:');
			}else{
				$form->addError("Username is already taken, try difrent name");
			}
    }
}