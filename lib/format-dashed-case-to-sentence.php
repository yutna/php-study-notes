<?php

function format_dashed_case_to_sentence($dashed_case_string)
{
  $removed_extension_string = str_replace(['.php'], '', $dashed_case_string);
  $removed_dashed_string = str_replace(['-'], ' ', $removed_extension_string);

  return ucwords($removed_dashed_string);
}
