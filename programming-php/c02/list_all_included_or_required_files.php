<?php

include_once 'includes/file_1.php';
require 'includes/file_2.php';
include_once 'includes/file_1.php';

var_dump(get_included_files());
