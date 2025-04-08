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
<!--linky pre css-->
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/style/style.css">
	<!-- Meniace linky pre css -->
';
		if (isset($currentCssPage)) /* line 9 */ {
			echo '		<link rel="stylesheet" href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */;
			echo '/style/';
			echo LR\Filters::escapeHtmlAttr($currentCssPage) /* line 10 */;
			echo '.css">
';
		}
		echo '    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>

	<title>';
		if ($this->hasBlock('title')) /* line 14 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 14 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
</head>

<body>
    <div id="unclick-background" style="display: none;"> 
		<div id="">
';
		if (isset($userProjekts)) /* line 20 */ {
			echo '				<p></p><br>
';
		}
		echo '			<button>zrušiť</button> <button>zmazať</button>
		</div>
	</div>

	<header>
	
		<ul>
		
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:')) /* line 31 */;
		echo '">Home </a></li>
';
		if ($user->isLoggedIn()) /* line 32 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektsPage:projektsPage')) /* line 33 */;
			echo '"> projekt page </a></li>
';
		}
		if ($user->isLoggedIn()) /* line 35 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('SignIn:SignOut')) /* line 36 */;
			echo '" >Sign out</a></li>
';
		} else /* line 37 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Registration:registration')) /* line 38 */;
			echo '">registracia </a></li>
				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('SignIn:signIn')) /* line 39 */;
			echo '">Prihlásenie </a></li>
';
		}
		echo '
		</ul>
';
		foreach ($flashes as $flash) /* line 43 */ {
			echo '		<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 43 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 43 */;
			echo '</div>
';

		}

		echo '
	</header>
	
	<main>
		
';
		$this->renderBlock('content', [], 'html') /* line 49 */;
		echo '	</main>
	<footer>
		<p> created by: &copy Oliver Chalúpka</p>
	</footer>
';
		$this->renderBlock('scripts', get_defined_vars()) /* line 54 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '43'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 54 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3/src/assets/netteForms.js"></script>
';
	}
}
