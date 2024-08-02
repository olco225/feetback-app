<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\Nette-projekt4\app\UI/@layout.latte */
final class Template_8fe3d07caf extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\Nette-projekt4\\app\\UI/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

	<title>';
		if ($this->hasBlock('title')) /* line 9 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 9 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
</head>

<body>
	<header>

	</header>
	<main>
';
		foreach ($flashes as $flash) /* line 17 */ {
			echo '		<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 17 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 17 */;
			echo '</div>
';

		}

		echo '		<ul>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektsPage:projektsPage')) /* line 19 */;
		echo '"> projekt page </a></li>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Registration:registration')) /* line 20 */;
		echo '">registracia </a></li>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:')) /* line 21 */;
		echo '">Home </a></li>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Rating:Rating')) /* line 22 */;
		echo '">rating page </a></li>

		</ul>
';
		$this->renderBlock('content', [], 'html') /* line 25 */;
		echo '	</main>
';
		$this->renderBlock('scripts', get_defined_vars()) /* line 27 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '17'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 27 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3/src/assets/netteForms.js"></script>
';
	}
}
