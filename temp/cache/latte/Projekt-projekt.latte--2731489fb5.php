<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI\Projekt/projekt.latte */
final class Template_2731489fb5 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\spetna-vezba\\app\\UI\\Projekt/projekt.latte';

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

		echo '<h1>';
		echo LR\Filters::escapeHtmlText($projekt->title) /* line 3 */;
		echo '</h1>
    <div>
        <h2>Otázka pre hodnotenie: ';
		echo LR\Filters::escapeHtmlText($projekt->question) /* line 6 */;
		echo '</h2>
        <div id="canvas-container">
            <canvas id="qrCode-canvas"></canvas>
            <button class="buttons green-button" id="generate-qrcode-btn" projekt-id="';
		echo LR\Filters::escapeHtmlAttr($projekt->id) /* line 9 */;
		echo '">Generovať QR kód</button>
            <a class="buttons" id="download-button" download="qrCode.png">stiahuť QR kód</a>
        </div>
        
        <div id="url-text-container"><strong>Link url pre spätnú väzbu: </strong><span id="url-text"></span></div>
        <!-- link pre testovacie účely -->
        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Feetback:feetback', ['projektId' => $projekt->id])) /* line 15 */;
		echo '" class="buttons blue-button" id="url-local-link">Otestuj stránku so spätnou väzbou</a>
    </div>

<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */;
		echo '/script/projekt/qrCode.js"></script>
<script>
    let qrCodeButton = document.querySelector("#generate-qrcode-btn");
    let projektId = qrCodeButton.getAttribute("projekt-id");
    qrCodeButton.addEventListener("click", function(){
        generateQrCode(projektId);
    });
    
</script>
';
		$this->createTemplate('partials/comments.latte', $this->params, 'include')->renderToContentType('html') /* line 30 */;
		echo '<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 31 */;
		echo '/script/projekt/comments.js"></script>';
	}
}
