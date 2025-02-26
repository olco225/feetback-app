<?php
namespace App\UI\SignIn;

use App\UI\BasePresenter;
use Nette\Application\UI\Form;

final class SignInPresenter extends BasePresenter{
    protected function createComponentSignInForm() :Form{
        $form = new Form;
        $form->addText("username", "Username:");
        $form->addPassword("password", "Password:");
        $form->addSubmit("send", "prihlásiť sa");

        $form->onSuccess[] = [$this, "signInFormSuccessed"];
        return $form;
    }
    public function signInFormSuccessed(Form $form, $values):void {
        $this->redirect("Home:default");
    }
}