<?php

class Button {
    public function render($button_text) {
        $button_html = '<button class="buy-now-button">' . htmlspecialchars($button_text) . '</button>';
        return $button_html;
    }
}


?>
