<?php
//Remove Extra Blanks
header("Content-Type: text/plain");

$text = $_GET['text'];

if (!isset($text)) 
{
    echo 'Parameter "text" is required';
}
else 
{
    $text = trim($text);      
    $text = preg_replace('/ +/', ' ', $text);
    echo '"' . $text . '"';
}