<?php

header("Content-Type: text/plain");

$known = "Fred";
$query = "Phred";

// soundex and metaphone are functions for compare their pronunciations.
// metaphone is generally more accurate than soundex

if (soundex($known) === soundex($query)) {
    echo "soundex: {$known} sounds like {$query}\n";
} else {
    echo "soundex: {$known} doesn't sound like {$query}\n";
}

if (metaphone($known) === metaphone($query)) {
    echo "metaphone: {$known} sounds like {$query}\n";
} else {
    echo "metaphone: {$known} doesn't sound like {$query}\n";
}

$string1 = "Rasmus Lerdoft";
$string2 = "Razmus Lehrdorf";

// similar_text returns the number of characters that its two string arguments
// have in common.
// You can give the third argument, the similar_text will assign the percentage
// value of similar text between two strings.
$common = similar_text($string1, $string2, $percent);
printf("They have %d chars in common (%.2f%%).\n", $common, $percent);

// The Levenshtein algorithm calculates the similarity of two strings based on
// how many characters you must add, subsitute, or remove to make them the same.
$similarity = levenshtein("cat", "cot");
echo $similarity . "\n";

// RECHECK: ไม่ค่อยเข้าใจเรื่อง weight value ของ 3 optional arugments เท่าไหร่
// อาจจะต้องไปศึกษาเพิ่ม
echo levenshtein("would not", "wouldn't", 500, 1, 1);
