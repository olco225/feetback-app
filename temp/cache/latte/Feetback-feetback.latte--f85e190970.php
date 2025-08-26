<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI\Feetback/feetback.latte */
final class Template_f85e190970 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\spetna-vezba\\app\\UI\\Feetback/feetback.latte';

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


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="form-container">
    <h2 id="question-of-feetback">';
		echo LR\Filters::escapeHtmlText($projektQuestion) /* line 3 */;
		echo '</h2>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('ratingForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 4 */;

		echo '</div>';
	}
}
