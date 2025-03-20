<?php
namespace App\UI\SignIn;

use App\UI\BasePresenter;
use Nette\Application\UI\Form;

use App\Model\SingInFacade ;


final class SignInPresenter extends BasePresenter{
    public function __construct(
        private SingInFacade $singInFacade,
    ){
    }
    protected function createComponentSignInForm() :Form{
        $form = new Form;
        $form->addText("username", "Username:")->setRequired("zadajte uživatelské meno.");
        $form->addPassword("password", "Password:")->setRequired("zadajte heslo.");
        $form->addSubmit("send", "prihlásiť sa");

        $form->onSuccess[] = [$this, "signInFormSuccessed"];
        return $form;
    }
    public function signInFormSuccessed(Form $form, $formData):void {
        
        $dbUserData = $this->singInFacade->getUser($formData->username);

        //Neviem ako presne funguje empty, takže to môže robiť chyby
        if(empty($dbUserData)){
            $form->addError("Užívatel neexistuje.");
        }else{

            $userIsLogedIn = $this->singInFacade->singInUser($formData->username, $formData->password);

            if($userIsLogedIn){
                $this->flashMessage("Ste Prihlásený.");

                //!! prípadne pridať esťe nejakú akciu po prihlásení.
                //$this->redirect("");
            }else{
                $form->addError("Nesprávne heslo. Skúste znova.");
            }
        }
        
        //$this->redirect("Home:default");
    }
    public function renderSignIn(){

    }
}