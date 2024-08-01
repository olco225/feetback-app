<?php
namespace App\UI\ProjektSetter;
use Nette;
use App\Model\ProjektFacade;
use Nette\Application\UI\Form;
final class ProjektSetterPresenter extends Nette\Application\UI\Presenter{
    public function __construct(
        private ProjektFacade $projektFacade,
    ){
    }
    public function createComponentSetProjektForm(): Form{
        $form = new Form;
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
    private function projektFormSucceeded(array $data): void{
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
}