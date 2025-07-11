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

        $form->addText("username", "Prihlasovacie meno:")->setHtmlAttribute("class", "inputs")
        ->setRequired("Zadajte prihlasovacie meno.");
        $form->addPassword("password", "Heslo:")->setHtmlAttribute("class", "inputs")
        ->setRequired("Zadajte heslo.");
        $form->addSubmit("send", "prihlásiť sa")->setHtmlAttribute("class", "inputs");

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

                $this->redirect("Home:default");
            }else{
                $form->addError("Nesprávne heslo. Skúste znova.");
            }
        }
    }
    public function renderSignIn(){
        $this->template->currentCssPage = "singIn";

    }
    public function actionSignOut(){
        $user = $this->getUser();
        $user->logout();
        $this->flashMessage("Ste odhlásený.");
        $this->redirect("Home:default");
    }
}