<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\Nette-projekt4\app\UI\SignIn/signIn.latte */
final class Template_9b098f57c8 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\Nette-projekt4\\app\\UI\\SignIn/signIn.latte';

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

		echo '<h1>Prihlásenie</h1>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('signInForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 3 */;
	}
}
