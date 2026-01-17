<?php

namespace App\Support;

use Parsedown;

class Markdown
{
    public static function render(string $text): string
    {
        /*
        |--------------------------------------------------------------------------
        | 1️⃣ Titres Discord-like
        |--------------------------------------------------------------------------
        */

        // ### -> h4
        $text = preg_replace('/^###\s+/m', '#### ', $text);

        // ## -> h3
        $text = preg_replace('/^##\s+/m', '### ', $text);

        // # -> h2
        $text = preg_replace('/^#\s+/m', '## ', $text);

        /*
        |--------------------------------------------------------------------------
        | 2️⃣ Underline custom (__text__)
        |--------------------------------------------------------------------------
        */
        $text = preg_replace(
            '/__(.*?)__/',
            '%%UNDERLINE%%$1%%ENDUNDERLINE%%',
            $text
        );

        /*
        |--------------------------------------------------------------------------
        | 3️⃣ Markdown parsing
        |--------------------------------------------------------------------------
        */
        $parsedown = new Parsedown();
        $parsedown->setSafeMode(true);
        $parsedown->setBreaksEnabled(true);

        $html = $parsedown->text($text);

        /*
        |--------------------------------------------------------------------------
        | 4️⃣ Ajout class="link" + target sur TOUS les <a>
        | (liens simples ET [texte](url))
        |--------------------------------------------------------------------------
        */
        $html = preg_replace_callback(
            '/<a\s+href="([^"]+)".*?>(.*?)<\/a>/i',
            function ($m) {
                return '<a href="' . $m[1] . '" class="link" target="_blank" rel="noopener noreferrer">' . $m[2] . '</a>';
            },
            $html
        );

        /*
        |--------------------------------------------------------------------------
        | 5️⃣ Restauration underline
        |--------------------------------------------------------------------------
        */
        $html = str_replace(
            ['%%UNDERLINE%%', '%%ENDUNDERLINE%%'],
            ['<u>', '</u>'],
            $html
        );

        return $html;
    }
}
