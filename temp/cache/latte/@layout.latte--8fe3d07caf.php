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

	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/style/style.css">
	
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>

	<title>';
		if ($this->hasBlock('title')) /* line 11 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 11 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
</head>

<body>
	<header>
	
		<ul>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektsPage:projektsPage')) /* line 18 */;
		echo '"> projekt page </a></li>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Registration:registration')) /* line 19 */;
		echo '">registracia </a></li>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('SignIn:signIn')) /* line 20 */;
		echo '">Prihlásenie </a></li>
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:')) /* line 21 */;
		echo '">Home </a></li>

		</ul>
		<div> Flash message testing</div>
	</header>
	<main>
		
';
		$this->renderBlock('content', [], 'html') /* line 30 */;
		echo '	</main>
	<footer>
		<p>toto je petička</p>
	</footer>
';
		$this->renderBlock('scripts', get_defined_vars()) /* line 35 */;
		echo '</body>
</html>
';
	}


	/** {block scripts} on line 35 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3/src/assets/netteForms.js"></script>
';
	}
}
