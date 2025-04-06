<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\Nette-projekt4\app\UI\ProjektsPage/projektsPage.latte */
final class Template_dac947c578 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\Nette-projekt4\\app\\UI\\ProjektsPage/projektsPage.latte';

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
			foreach (array_intersect_key(['projekt' => '4'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '    <div id="unclick-background" > </div>
    <div id="main-container">
';
		foreach ($userProjekts as $projekt) /* line 4 */ {
			echo '            <div class="project-container"> 
                <h2><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Projekt:projekt', [$projekt->id])) /* line 6 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($projekt->title) /* line 6 */;
			echo '</a></h2>
                <button><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektSetter:EditProjekt', [$projekt->id])) /* line 7 */;
			echo '">edit</a></button>
            </div>
            
';

		}

		echo '        <button id="create-button"><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektSetter:CreateProjekt')) /* line 11 */;
		echo '">create</a></button>
    </div>
    ';
	}
}
