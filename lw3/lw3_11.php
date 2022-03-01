<?php
//Remove Extra Blanks
header("Content-Type: text/plain");

function getGetParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET['$name'] : null;
}

if (getGetParameter('text') === null) 
{
    echo 'Requied parameter "text"';
}
else 
{
    $text = getGetParameter('text');
    $text = trim($text);      
    while (strpos($text, '  ')) 
    {
        $text = str_replace('  ', ' ', $text);
    } 
 
    echo '"'.$text.'"';
}