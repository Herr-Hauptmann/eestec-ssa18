<?php
/**
 * Created by PhpStorm.
 * User: Tarik
 * Date: 11.01.2018.
 * Time: 09:48
 */

namespace App\Utility;


class StringUtility
{
    /**
     * Shortens the string($text) to the number of words given by second parameter and appends third parameter
     * Optionally if text is one big word (bigger then 2 x $length) the text is shortened
     * to "2 x $length + 2" characters and appended third parameter
     *
     * @param string $text to be shortened
     * @param int $length Describes how many words should be inside the string
     * @param string $append
     * @return string
     */
    public static function shortenString(string $text, int $length, $append = '...'): string
    {
        /**
         * Collect all words from the string to an array
         * @var array $words
         */
        $words = \str_word_count($text, 2);

        $words = array_keys($words);

        if (\count($words) > $length) {
            $text = (string) substr($text, 0, $words[$length] - 1) . $append;

        } else if (\strlen($text) > $length * $length) {
            // In case text is actually one big word
            $text = (string) substr($text, 0, $length * $length + 2) . $append;
        }
        return $text;
    }

    /**
     * Always generates a full URL from any given link
     *
     * @param string $url
     * @return string
     */
    public static function parseUrl(string $url)
    {
        // Maybe check if passed url is valid first?
        return ! \str_contains('http', $url) ? 'http://' . $url : $url;
    }

    /**
     * Create a random string
     * @param $length the length of the string to create
     * @return $str the string
     */
    public static function generateRandomString($length = 10) {
        $str = '';
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}