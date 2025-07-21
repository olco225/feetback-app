<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI\ProjektsPage/projektsPage.latte */
final class Template_87434f70f2 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\spetna-vezba\\app\\UI\\ProjektsPage/projektsPage.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['projekt' => '3'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <div id="main-container">
';
		foreach ($userProjekts as $projekt) /* line 3 */ {
			echo '            <div class="project-container"> 
                <h2><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Projekt:projekt', [$projekt->id])) /* line 5 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($projekt->title) /* line 5 */;
			echo '</a></h2>

                <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektSetter:EditProjekt', [$projekt->id])) /* line 7 */;
			echo '" class="buttons blue-button">upraviť</a>
                <button class="buttons predelet-button" projektId="';
			echo LR\Filters::escapeHtmlAttr($projekt->id) /* line 8 */;
			echo '" >zmazať</button> 
                <!-- invisible button for hard delet -->
                <button id="delet-button-projekt';
			echo LR\Filters::escapeHtmlAttr($projekt->id) /* line 10 */;
			echo '" style="display: none;"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Projekt:DeletProjekt', [$projekt->id])) /* line 10 */;
			echo '">hard delet</a></button>
            </div>
            
';

		}

		echo '        <div class="project-container">
            <h2>Nový projekt</h2>
            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektSetter:CreateProjekt')) /* line 16 */;
		echo '" class="buttons green-button">vytvoriť</a>
        </div>
    </div>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */;
		echo '/script/controlFormular.js"></script>
    <script>

        let buttons = Array.from(document.getElementsByClassName("predelet-button"));
        buttons.forEach(function(element){
            
            let projektId = element.getAttribute("projektId");
            console.log(projektId);
            element.addEventListener("click", function(){
                showControlFormular(projektId);
        });
        });
		document.getElementById("cancel-control-formular").addEventListener("click", hideControlFormular);
        //cesta k získaniu kontrolného okienka praragraph
        let projektTitle = "";
        let paragraphText = "Naozaj chcete vymazať projekt s názvom " + projektTitle;
    </script>';
	}
}
