<?php

// The error handler is called when a condition of any kind is encountered, and
// can do anything you want it to. from logging information to a file to pretty-
// printing the error message.

// The basic process is to create an error-handling function and register it
// with `set_error_handler()`

// The function you declare can take in either two or five parameters. The first
// two parameters are the error code and a string describing the error.
// The final three parameters, if your function accepts them, are the filename
// in which the error occurred, the line number at which the error occurred, and
// a copy of the active symbol table at the time the error occurred. Your error
// handler should check the current level of errors being reported with
// `error_reporting()` and act appropriately.

// The call to `set_error_handler()` returns the current error handler. You can
// restore the previous error handler either by calling `set_error_handler()`
// with the returned value when your script is done with its own error handler.
// or by calling the `restore_error_handler()` function.

function display_error($error, $error_string, $filename, $line, $symbols)
{
    $message = <<<MSG
    <p>
        Error '<b>{$error_string}</b>' occurred. <br />
        -- in file '<i>{$filename}</i>', line {$line}.
    </p>
    MSG;

    echo $message;
}

set_error_handler('display_error');
$value = 4 / 0;

// RECHECK: มันเห็นมันใช้ได้เลย 🤔
// มีอีกสองหัวข้อต่อเนื่องจากหัวข้อนี้คือ
// 1) Logging in error handlers
// 2) Output buffering in error handlers
// เนื่องจากตัวอย่างข้างบนมันไม่เห็น print message ที่ register ไว้เลย เลย skip สองหัวข้อนี้ไปไม่ได้
// ทำตัวอย่างไฟล์ให้ดู ถ้าในอนาคตกลับมา recheck ตรงนี้อย่าลืมกลับไปดูสองหัวข้อที่กล่าวมาด้วยนะ 😉
