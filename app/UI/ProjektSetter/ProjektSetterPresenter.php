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
    public function createComponentSetProjektForm(): Form{
        $form = new Form;
        //získanie, projekt id keď to je projekt id
        $projektId = $this->getParameter("projektId");

        $form->addText("title", "Title")
        ->setRequired("Title must be");

        if($projektId){
            $form->addSubmit('send', 'Update');
        }else{
            $form->addSubmit('send', 'Create');
        }
        

        $form->onSuccess[] = $this->projektFormSucceeded(...);
        return $form;
    }
    private function projektFormSucceeded(Form $form, array $data): void{
        $projektId = $this->getParameter("projektId");
        if($projektId){
            $this->projektFacade->updateProjekt($projektId, $data);
        }else{
            $this->projektFacade->addProjekt($data);
        }
        $this->redirect("ProjektsPage:projektsPage");

    }
    public function renderProjektSetter($projektId): void{
        $projekt = $this->projektFacade->getProjekt($projektId);
        if($projektId){
            $projektData = $this->projektFacade->getProjekt($projektId);
            $this->template->projektId = $projektId;
            //vloženie údajov do formulára
            $this->getComponent('setProjektForm')
            ->setDefaults($projektData->toArray());
        }else{
            $this->template->projektId = Null;

        }

        
    }
//create projekt
    public function createComponentCreateProjektForm(): Form{
        $form = new Form;

        $form->addText("title", "Title:")->setRequired("Title must be");
        $form->addTextArea("question", "Qustion:");
        $form->addSubmit('send', 'Create');


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
        }else{
            $form->addError("Nastala nejaká chyba skúste znova.");
        }
    }
    public function renderCreateProjekt(){

    }
//edit projekt
    public function createComponentEditProjektForm(){

    }
    public function editProjektFormSucceeded(){

    }
    public function renderEditProjekt(){
        
    }
}