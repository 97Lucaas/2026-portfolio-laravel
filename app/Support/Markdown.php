<?php

namespace App\Support;

use Parsedown;
use DOMDocument;

class Markdown
{
    public static function render(string $text): string
    {
        /*
        |--------------------------------------------------------------------------
        | 1️⃣ Décalage EXACT des titres (Discord-like)
        |--------------------------------------------------------------------------
        */

        // ### -> ####   (h4)
        $text = preg_replace('/^###(?!#)\s+/m', '#### ', $text);

        // ## -> ###     (h3)
        $text = preg_replace('/^##(?!#)\s+/m', '### ', $text);

        // # -> ##       (h2)
        $text = preg_replace('/^#(?!#)\s+/m', '## ', $text);

        /*
        |--------------------------------------------------------------------------
        | 2️⃣ Underline custom (__text__)
        |--------------------------------------------------------------------------
        */
        $text = preg_replace(
            '/__(.*?)__/',
            '%%UNDERLINE_START%%$1%%UNDERLINE_END%%',
            $text
        );

        /*
        |--------------------------------------------------------------------------
        | 3️⃣ Markdown parsing sécurisé
        |--------------------------------------------------------------------------
        */
        $parsedown = new Parsedown();
        $parsedown->setSafeMode(true);
        $parsedown->setBreaksEnabled(true);

        $html = $parsedown->text($text);

        /*
        |--------------------------------------------------------------------------
        | 4️⃣ Ajout class="link" sur TOUS les <a>
        |--------------------------------------------------------------------------
        */
        $html = preg_replace(
            '/<a\s+href="([^"]+)"/i',
            '<a href="$1" class="link" target="_blank" rel="noopener noreferrer"',
            $html
        );

        /*
        |--------------------------------------------------------------------------
        | 5️⃣ Restauration underline
        |--------------------------------------------------------------------------
        */
        $html = str_replace(
            ['%%UNDERLINE_START%%', '%%UNDERLINE_END%%'],
            ['<u>', '</u>'],
            $html
        );

        return $html;
    }
}
