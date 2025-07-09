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
        $form->addText("email", "Email:");

        $form->addText("username", "Prihlasovacie meno:")
        ->setRequired("Prihlasovacie meno treba vyplniť, kvôly fungovaniu aplikácie");

        $form->addPassword("password", "Heslo:")
        ->setRequired("Heslo treba vyplniť, kvôly fungovaniu aplikácie");

        $form->addSubmit('send', 'Registrácia');

        $form->onSuccess[] = $this->registrationFormSucceeded(...);
        return $form;
    }
    private function registrationFormSucceeded(Form $form, \stdClass $data): void{
			$userExist = $this->registrationFacade->userExist($data);
			if($userExist == False)
			{
				$this->registrationFacade->insertRegistrationDataHash($data);
				$this->flashMessage('Registácia prebehla úspešne.', 'success');
            	$this->redirect('Home:default');
			}else{
				$form->addError("Uživatelské meno je už zabraté, treba si vybrať iné.");
			}
    }
    public function renderRegistration(){
        $this->template->currentCssPage = "registration";
    }
}