<?php

header("Content-Type: text/plain");

// The strspn() and strcspn() functions tell you how many characters at the
// beginning of a string are composed of certain characters: 🤔
// $length = strspn($string, $characters);

echo strspn("Yutthana", "Yutt"); // 4
echo "\n";

// The c in strcspn() stands for complement - it tells you how much of the start
// of the string is NOT composed of the characters in the character set.
// Use it when the number of interesting characters is greater than the number
// of uninteresting characters
echo strcspn("Yutthana\n", "\n\t\0"); // 8
