<?php

declare(strict_types=1);

class Log
{
    public const LOG_FILE_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'log.txt';

    public string $filename;
    public $fh;

    public function __construct()
    {
        $this->filename = self::LOG_FILE_PATH;
        $this->open();
    }

    public function open()
    {
        $this->fh = fopen($this->filename, 'a') or die("Can't open {$this->filename}");
    }

    function write($note)
    {
        fwrite($this->fh, "{$note}\n");
    }

    function read()
    {
        return join('', file($this->filename));
    }

    function __wakeup()
    {
        $this->filename = self::LOG_FILE_PATH;
        $this->open();
    }

    function __sleep()
    {
        fclose($this->fh);
        return array('filename');
    }
}
