<?php

header('Content-Type: text/plain');

// NOTE:
// You can refer to text captured earlier in a pattern (ในความเข้าใจคือคำที่เหมือนกันก่อนหน้า)
// with a backreference: \1 refers to the contents of the first subpattern,
// \2 refers to the second, and so on.
var_dump(preg_match('/([[:alpha:]]+)\s+\1/', 'Paris in the the spring', $captured));
var_dump($captured);

// NOTE: preg_match() function captures at most 99 subpatterns; after that are
// ignored.

// RECHECK: เอาจริงเรื่อง backreference นี่ไม่ค่อยเข้าใจเท่าไหร่
