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
			foreach (array_intersect_key(['comment' => '53'], $this->params) as $ʟ_v => $ʟ_l) {
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
            <button class="buttons green-button" onclick="generateQRCode()">Generovať QR kód</button>
            <a class="buttons" id="download-button" download="qrCode.png">stiahuť QR kód</a>
        </div>
        
        <div id="url-text"><strong>Link url pre spetnú vezbu: </strong></div>
        <!-- link pre testovacie účely -->
        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Feetback:feetback', ['projektId' => $projekt->id])) /* line 15 */;
		echo '" class="buttons blue-button" id="url-local-link">Otestuj stránku so spetnou vezbou</a>
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
            
            document.getElementById("url-text").innerHTML += url;
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
<div id="coment-section">
    <p>';
		echo LR\Filters::escapeHtmlText($testValue->type) /* line 52 */;
		echo '</p>
';
		foreach ($commentars as $comment) /* line 53 */ {
			echo '        <div class="comment-box">
            <div>
                <h4>';
			echo LR\Filters::escapeHtmlText($comment->name) /* line 56 */;
			echo '</h4>
                <p>';
			echo LR\Filters::escapeHtmlText($comment->text) /* line 57 */;
			echo '</p>
                <p>';
			echo LR\Filters::escapeHtmlText($comment->time_of_creation) /* line 58 */;
			echo '</p>
            </div>
            <div class="coment-settings" style="border: 2px solid black; padding: 0.4rem;">
                <h3>beta verzia</h3>
';
			if (!is_object($ʟ_tmp = "commentTypeForm-{$comment->id}")) $ʟ_tmp = $this->global->uiControl->getComponent($ʟ_tmp);
			if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
			$ʟ_tmp->render() /* line 62 */;

			echo '            </div>
        </div>

';

		}

		echo '</div>

';
	}
}
