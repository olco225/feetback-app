<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\Nette-projekt4\app\UI\Projekt/projekt.latte */
final class Template_7a5781addc extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\Nette-projekt4\\app\\UI\\Projekt/projekt.latte';

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
    <div id="qrcode"></div>
    <button onclick="generateQRCode()">Generate QR Code</button>

    <script>
        function generateQRCode() {
            var text = "http://localhost/Nette-projekt4/www/projekt/projekt?projektId=4";
            var qrcodeContainer = document.getElementById("qrcode");
            qrcodeContainer.innerHTML = ""; // vyčistí obsah
            new QRCode(qrcodeContainer, text);
        }
    </script>';
	}
}
