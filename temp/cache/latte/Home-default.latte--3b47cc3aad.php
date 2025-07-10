<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI\Home/default.latte */
final class Template_3b47cc3aad extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\spetna-vezba\\app\\UI\\Home/default.latte';

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
		echo '	<h1>Webová aplikácia pre získavanie spetnej väzby.</h1>
	<div id="container1">
		<div class="text-blok">
			<p >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>
		<div id="blok-upozornenia">
			<h3><strong>Upozornenie:</strong></h3>
			<p>Napriek tomu, že som sa to snažil urobiť najlepšie ako som vedel, môžu sa tu vyskitovať rôzne chyby a buggy.</p>
			<p>- Ďakujem za pochopenie.</p>
		</div>
	</div>
	
';
	}
}
