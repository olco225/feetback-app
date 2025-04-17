<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI\Projekt/projekt.latte */
final class Template_73d93d4ebd extends Latte\Runtime\Template
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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['coment' => '37'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '<h1>';
		echo LR\Filters::escapeHtmlText($projekt->title) /* line 3 */;
		echo '</h1>
    <canvas id="qrCode-canvas"> </canvas>
    <button onclick="generateQRCode()">Generate QR Code</button>
    <a id="download-button" download="qrCode.png">stiahuť qrcode</a>
    <div id="url-text"></div>
    <!-- link pre testovacie účely -->
    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('feetback:feetback', [$projekt->id])) /* line 10 */;
		echo '" id="url-local-link">Pre testovacie účeli link</a>


    <script>
        //vytvorenie linku na stránku s hodnotením pre testovacie účely
        let projektId = ';
		echo LR\Filters::escapeJs($projekt->id) /* line 16 */;
		echo ';

        //funkcia pre generovanie qr codu
        function generateQRCode() {
            console.log(QRCode);

            let projektId = ';
		echo LR\Filters::escapeJs($projekt->id) /* line 22 */;
		echo ';
            let domen = "http://192.168.1.10/Nette-projekt4/www";
            let url = domen + "/feetback/feetback?projektId=" + projektId;
            
            document.getElementById("url-text").innerHTML = url;
            //vygenerovanie qrCodu
            let qrCodeCanvas = document.getElementById("qrCode-canvas");
            QRCode.toCanvas(qrCodeCanvas, url, function(error){
                if(error) console.log(error);
                document.querySelector("#download-button").href = qrCodeCanvas.toDataURL("image/png");

            });
        }
    </script>
';
		foreach ($comentars as $coment) /* line 37 */ {
			echo '    <div id="coment">
        <h4>';
			echo LR\Filters::escapeHtmlText($coment->name) /* line 39 */;
			echo '</h4>
        <p>';
			echo LR\Filters::escapeHtmlText($coment->text) /* line 40 */;
			echo '</p>
    </div>

';

		}

		echo '<style>
    #coment{
        border: 2px solid black;
    }
</style>
';
	}
}
