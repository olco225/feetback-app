<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI/@layout.latte */
final class Template_9d38d3b4f3 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\spetna-vezba\\app\\UI/@layout.latte';

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
	<!--<meta name="viewport" content="width=device-width">-->

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--linky pre css-->
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */;
		echo '/style/style.css">
	<!-- Meniace linky pre css -->
';
		if (isset($currentCssPage)) /* line 11 */ {
			echo '		<link rel="stylesheet" href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 12 */;
			echo '/style/';
			echo LR\Filters::escapeHtmlAttr($currentCssPage) /* line 12 */;
			echo '.css">
';
		}
		echo '    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>

	<title>';
		if ($this->hasBlock('title')) /* line 16 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 16 */;
			echo ' | ';
		}
		echo 'Spetná vezba</title>
</head>

<body>
	<!-- Kontrolný formulár -->
    <div id="unclick-background" style="display: none;"> 
		<div id="control-formular">
';
		if (isset($userProjekts)) /* line 23 */ {
			echo '				<p>Naozaj, chcete zmazať projekt?</p><br>
';
		}
		echo '			<button class="buttons" id="cancel-control-formular" >zrušiť</button> <button class="buttons" id="delet-projekt-button">zmazať</button>
		</div>
	</div>

	<header>
		<ul>
		<!--Navigation for page-->
			<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:')) /* line 33 */;
		echo '">Domov</a></li>
';
		if ($user->isLoggedIn()) /* line 34 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('ProjektsPage:projektsPage')) /* line 35 */;
			echo '">Projekty</a></li>
';
		}
		if ($user->isLoggedIn()) /* line 37 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('SignIn:SignOut')) /* line 38 */;
			echo '" >odhlásiť sa</a></li>
';
		} else /* line 39 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Registration:registration')) /* line 40 */;
			echo '">Registracia </a></li>
				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('SignIn:signIn')) /* line 41 */;
			echo '">Prihlásenie </a></li>
';
		}
		echo '
		</ul>
';
		foreach ($flashes as $flash) /* line 45 */ {
			echo '		<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 45 */;
			echo ' id="flash-message-container"><p>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 45 */;
			echo '</p></div>
';

		}

		echo '		
	</header>
	
	<main>
';
		$this->renderBlock('content', [], 'html') /* line 50 */;
		echo '	</main>
	<footer>
		<p> created by/ vytvorené: &copy Oliver Chalúpka</p>
	</footer>

<!--scripty -->

';
		$this->renderBlock('scripts', get_defined_vars()) /* line 58 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '45'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 58 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3/src/assets/netteForms.js"></script>
';
	}
}
