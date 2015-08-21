<?php
/**
 * Created by PhpStorm.
 * User: jdoris
 * Date: 8/20/15
 * Time: 5:13 PM
 */

$filepath = (__DIR__) . "/text/1.txt";

/**
 * Datto Coding Sample -
 * Write a function that accepts a file path as its argument, and returns the
 * word with highest count of a single letter as its output.  In the case of a
 * tie, return the first word.
 *
 * @param $filepath
 * @return str
 */
function findMostRepeatedChars($filepath) {
    $str = file_get_contents($filepath);
    $cleanstr = preg_replace('/[^a-zA-Z\s]/',"",$str); // strip out ignored chars
    $words = explode(" ", $cleanstr); // convert str to an array of words
    foreach($words as $word) {
        // get the character counts in the current word
        foreach(count_chars($word,1) as $i=>$val) {
            // build an array of counts that we can compare later
            $thiscount[chr($i)] = $val;
        }
        // use max() to determine the highest count in our array above.
        $counts[$word] = max($thiscount);
    }
    // return the KEY of the highest value using array_search()
    return(array_search(max($counts),$counts));
}

$theword = findMostRepeatedChars($filepath);
echo $theword . "\n";