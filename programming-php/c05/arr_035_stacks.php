<?php

header('Content-Type: text/plain');

// push ล่างเข้า pop ล่างออก
// shift บนออก unshift บนเข้า

// State debugger Program
$call_trace = array();

function enter_function($name)
{
    global $call_trace;
    $call_trace[] = $name;

    echo "Entering {$name} (stack is now: " . join(' -> ', $call_trace) . ")\n";
}

function exit_function()
{
    global $call_trace;

    echo "Exiting\n";
    array_pop($call_trace);
}

function first()
{
    enter_function("first");
    exit_function();
}

function second()
{
    enter_function("second");
    first();
    exit_function();
}

function third()
{
    enter_function("third");
    second();
    first();
    exit_function();
}

first();
third();
