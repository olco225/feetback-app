<?php
namespace App\UI\ProjektSetter;
use Nette;
use App\UI\BasePresenter;
use App\Model\ProjektFacade;
use Nette\Application\UI\Form;
final class ProjektSetterPresenter extends BasePresenter{
    public function __construct(
        private ProjektFacade $projektFacade,
    ){
    }
//create projekt
    public function createComponentCreateProjektForm(): Form{
        $form = new Form;

        $form->addText("title", "Nadpis:")->setHtmlAttribute("class", "inputs")->setRequired("Nadpis musí byť");
        $form->addTextArea("question", "Otázka v spätnej väzbe:")->setHtmlAttribute("class", "inputs");
        $form->addSubmit('send', 'Vytvoriť')->setHtmlAttribute("class", "buttons green-button");


        $form->onSuccess[] = [$this, "createProjektFormSucceeded"];
        return $form;
    }
    public function createProjektFormSucceeded(Form $form, $data){
        //príprava dát
        $user = $this->getUser();
        $userId = $user->getIdentity()->getId();

        $userProjektData = [
            "userId" => $userId,
            "title" => $data->title,
            "question" => $data->question
        ];
        //uloženie dát
        $result = $this->projektFacade->createUserProjekt($userProjektData);
        //kontrola dát, a následné akcie a upozornenia
        if($result){
            $this->flashmessage("Projekt bol vytvorený.");
            $this->redirect("ProjektsPage:ProjektsPage");
        }else{
            $form->addError("Nastala nejaká chyba skúste znova.");
        }
    }
    public function renderCreateProjekt(){
        //nastavenie štýlov 
        $this->template->currentCssPage = "createProjekt";

        $user = $this->getUser();
        $userIdentity = $user->getIdentity();
        if($userIdentity){
            $userId = $userIdentity->getId();
        }else{
            $this->template->setFile(__dir__ . "/../Error/Error4xx/403.latte");

        }

    }
//---------edit projekt----------
    public function createComponentEditProjektForm(): Form{
        $form = new Form;

        $form->addText("title", "Nadpis:")->setHtmlAttribute("class", "inputs")->setRequired("Nadpis musí byť");
        $form->addTextArea("question", "Otázka v spätnej väzbe:")->setHtmlAttribute("class", "inputs");
        $form->addSubmit('send', 'Aktualizovať')->setHtmlAttribute("class", "buttons blue-button");


        $form->onSuccess[] = [$this, "editProjektFormSucceeded"];
        return $form;
    }
    public function editProjektFormSucceeded(Form $form, $data){
        //príprava dát
        $user = $this->getUser();
        $userId = $user->getIdentity()->getId();

        $projektId = $this->getParameter("projektId");

        $userProjektData = [
            "id" => $projektId,
            "user_id" => $userId,
            "title" => $data->title,
            "question" => $data->question
        ];
        //update data
        $result = $this->projektFacade->updateUserProjekt($userProjektData);
        //kontrola update data
        if($result){
            $this->flashmessage("Projekt bol aktualizovaný.");
            $this->redirect("ProjektsPage:ProjektsPage");
        }else{
            $form->addError("Nastala nejaká chyba skúste znova.");
        }
    }
    public function renderEditProjekt($projektId){
        //nastavenie štýlov 
        $this->template->currentCssPage = "editProjekt";

        //zabespečenie načítavania dát do edit formuláru
        $user = $this->getUser();
        $userIdentity = $user->getIdentity();
        if($userIdentity){
            $userId = $userIdentity->getId();
            $projektData = $this->projektFacade->getProjekt($projektId);

            if($userId == $projektData->user_id){
                $this->getComponent('editProjektForm')
                ->setDefaults($projektData->toArray());
            }else{
                $this->template->setFile(__dir__ . "/../Error/Error4xx/403.latte");
            }
        }else{
            $this->template->setFile(__dir__ . "/../Error/Error4xx/403.latte");

        }

    }
}
