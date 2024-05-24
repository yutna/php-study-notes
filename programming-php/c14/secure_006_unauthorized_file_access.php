<?php

// Restrict filesystem access to a specific directory
// You can set the `open_basedir` option to restrict access from your PHP script
// to a specific directory or in `php.ini` or in `httpd.conf`
// open_basedir = /some/path

// -----------------------------------------------------------------------------

// Get permissions right the first time
// Do NOT create a file and then change its permissions. This creates a race
// condition.
// By default `fopen()` function attempts to create a file with permission
// 0666, Don't call `umask()` function to change permission before `fopen` call

// -----------------------------------------------------------------------------

// Protect session files
// set the `session.save_path` to your own directory

// -----------------------------------------------------------------------------

// Canceal PHP libraries
// Store code libraries and data outside the server's document root
// คือง่ายๆ อะไรที่อยู่ใน document root แล้ว user สามารถ download ผ่าน browser ได้และเป็นไฟล์
// ที่ sensitive อย่าเอาไปวางไว้

// -----------------------------------------------------------------------------
