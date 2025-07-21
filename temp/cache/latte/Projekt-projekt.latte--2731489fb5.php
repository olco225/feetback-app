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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['coment' => '51'], $this->params) as $ʟ_v => $ʟ_l) {
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
    <div>
        <h2>Otázka pre hodnotenie: ';
		echo LR\Filters::escapeHtmlText($projekt->question) /* line 6 */;
		echo '</h2>
        <div id="canvas-container">
            <canvas id="qrCode-canvas"></canvas>
            <button class="buttons" onclick="generateQRCode()">Generovať QR kód</button>
            <a class="buttons" id="download-button" download="qrCode.png">stiahuť QR kód</a>
        </div>
        
        <div id="url-text"></div>
        <!-- link pre testovacie účely -->
        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Feetback:feetback', ['projektId' => $projekt->id])) /* line 15 */;
		echo '" class="buttons" id="url-local-link">Otestuj stránku so spetnou vezbou</a>
    </div>

    <script>
        //vytvorenie linku na stránku s hodnotením pre testovacie účely
        let projektId = ';
		echo LR\Filters::escapeJs($projekt->id) /* line 21 */;
		echo ';

        //funkcia pre generovanie qr codu
        function generateQRCode() {
            console.log(QRCode);
            //nastavovanie linkou
            let projektId = ';
		echo LR\Filters::escapeJs($projekt->id) /* line 27 */;
		echo ';

            let localDomen = "http://192.168.1.10/spetna-vezba/www";
            let hostingDomen = "http://spetna-vezba.oliver-chalupka.sk/www";
            
            let url = localDomen + "/feetback/feetback?projektId=" + projektId;
            
            document.getElementById("url-text").innerHTML = url;
            //vygenerovanie qrCodu
            let qrCodeCanvas = document.getElementById("qrCode-canvas");
            QRCode.toCanvas(qrCodeCanvas, url, {
                type: "svg",
                width: 600
            },function(error){
                if(error) console.log(error);
                document.querySelector("#download-button").href = qrCodeCanvas.toDataURL("image/png");

            });
            //pridanie štýlov na výšku a šírku, gôli prebiťiu width qrcode pôvodné nastavené štýli
            qrCodeCanvas.style.width = "60vh";
            qrCodeCanvas.style.height = "60vh";
        }
    </script>
';
		foreach ($comentars as $coment) /* line 51 */ {
			echo '    <div class="comment-box">
        <h4>';
			echo LR\Filters::escapeHtmlText($coment->name) /* line 53 */;
			echo '</h4>
        <p>';
			echo LR\Filters::escapeHtmlText($coment->text) /* line 54 */;
			echo '</p>
        <p>';
			echo LR\Filters::escapeHtmlText($coment->time_of_creation) /* line 55 */;
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
