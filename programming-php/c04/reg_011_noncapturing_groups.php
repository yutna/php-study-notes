<?php

header("Content-Type: text/plain");

// If you want to create a subpattern wihtout capturing the matching text, you
// can do this using the (?: subpattern) construct
var_dump(preg_match("/(?:ello)(.*)/", "jello biafra", $captured));
var_dump($captured);

// ลองเอา ?: ออก คำว่า ello จะถูก capture
