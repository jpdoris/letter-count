<?php
/**
 * Coding Problem -
 * Write a function that accepts a file path as its argument, and returns the
 * word with highest count of a single letter as its output.  In the case of a
 * tie, return the first word.
 */

$input = "";
if (defined('STDIN')) {
    if (is_array($argv) && array_key_exists(1, $argv)) {
        $input = $argv[1];
    }
}

/**
 * @param $filepath
 * @return false|int|string
 */
function findMostRepeatedChars($input) {
    $str = file_get_contents($input);
    // remove ignored chars
    $cleanStr = preg_replace('/[^a-zA-Z\s]/',"",$str);
    $spacedStr = preg_replace('/\s{2,}/'," ",$cleanStr);
    // convert cleaned string to an array of words
    $words = explode(" ", $spacedStr);
    $counts = [];
    foreach($words as $word) {
        $thisCount = [];
        // get the character counts in the current word, disregarding case
        foreach(count_chars(strtolower($word),1) as $i=>$val) {
            // build an array of counts that we can compare later
            $thisCount[chr($i)] = $val;
        }
        // use max() to determine the highest count in our array above.
        $counts[$word] = max($thisCount);
    }
    // return the value with the highest count
    return(array_search(max($counts),$counts));
}

if ($input) {
    echo findMostRepeatedChars($input) . "\n";
}