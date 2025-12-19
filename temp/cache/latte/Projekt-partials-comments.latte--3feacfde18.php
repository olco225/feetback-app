<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\wamp64\www\spetna-vezba\app\UI\Projekt\partials\comments.latte */
final class Template_3feacfde18 extends Latte\Runtime\Template
{
	public const Source = 'C:\\wamp64\\www\\spetna-vezba\\app\\UI\\Projekt\\partials\\comments.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<div class="comment-section">
    <h2>Komentáre</h2>
';
		foreach ($commentars as $comment) /* line 3 */ {
			echo '        <div class="comment-box comment-box-';
			echo LR\Filters::escapeHtmlAttr($comment->type) /* line 4 */;
			echo '" id="comment-box-';
			echo LR\Filters::escapeHtmlAttr($comment->id) /* line 4 */;
			echo '">
            <div class="comment comment-';
			echo LR\Filters::escapeHtmlAttr($comment->type) /* line 5 */;
			echo '">
                <h4>';
			echo LR\Filters::escapeHtmlText($comment->name) /* line 6 */;
			echo '</h4>
                <p>';
			echo LR\Filters::escapeHtmlText($comment->text) /* line 7 */;
			echo '</p>
                <p class="time-of-creation">';
			echo LR\Filters::escapeHtmlText($comment->time_of_creation) /* line 8 */;
			echo '</p>
                <button class="hide-comment hide-comment-';
			echo LR\Filters::escapeHtmlAttr($comment->type) /* line 9 */;
			echo ' buttons" commentId="';
			echo LR\Filters::escapeHtmlAttr($comment->id) /* line 9 */;
			echo '" onclick="hideComment(';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($comment->id)) /* line 9 */;
			echo ')">schovať komentár</button>
            </div>
            <div class="hate-comment-warning hate-comment-warning-';
			echo LR\Filters::escapeHtmlAttr($comment->type) /* line 11 */;
			echo '">
                <p>Toto je komentár, ktorý sa snaží svojim obsahom, skôr ublížiť človeku ako mu pomôcť sa zlepšiť, alebo niečo zlepšiť.</p>
                <button class="show-comment buttons" commentId="';
			echo LR\Filters::escapeHtmlAttr($comment->id) /* line 13 */;
			echo '" onclick="showComment(';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($comment->id)) /* line 13 */;
			echo ')">ukázať komentár</button>
            </div>
            <div class="comment-type-settings" >
';
			if (!is_object($ʟ_tmp = "commentTypeForm-{$comment->id}")) $ʟ_tmp = $this->global->uiControl->getComponent($ʟ_tmp);
			if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
			$ʟ_tmp->render() /* line 16 */;

			echo '            </div>
        </div>

';

		}

		echo '</div>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['comment' => '3'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
