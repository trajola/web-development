<?php
//Check Identifier
header("Content-Type: text/plain");

$ident = $_GET['identifier']; 
$errorComment = 'Ok identifier';

if (!isset($ident)) 
{
    $errorComment = 'Parameter "identifier" is required';
}
elseif ($ident === '') 
{
    $errorComment = 'None identifier found';
}  
elseif (!preg_match('/^[a-z]([a-z0-9])*$/i', $ident))
{    
    $errorComment = 'Error found in identifier';
}

echo $errorComment;