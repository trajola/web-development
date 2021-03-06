<?php
//Password Strength
header("Content-Type: text/plain");

$pass = $_GET['password'];
$passStrengthComment = '';

function sum($carry, $item)
{
    $carry += strlen($item);
    return $carry;
}

if (!isset($pass)) 
{
    $passStrengthComment = 'Parameter "password" is required';
}
elseif (! ctype_alnum($pass)) 
{
    $passStrengthComment = 'Password might consist of numbers and letters.';
}
else 
{
    $lowerCount = 0;  
    if (preg_match_all('/[a-z]+/', $pass, $matches))
      $lowerCount = array_reduce($matches[0], 'sum');
    echo ' lower ' . $lowerCount . '  ';
    $upperCount = 0;
    if (preg_match_all('/[A-Z]+/', $pass, $matches))
      $upperCount = array_reduce($matches[0], 'sum');
    echo ' upper ' . $upperCount . '  ';
    $passLength = strlen($pass);
    $numCount = $passLength - $upperCount - $lowerCount;

    $passStrength = 0;
    $passStrength += 4 * $passLength;
    $passStrength += 4 * $numCount;
    if ($upperCount > 0)
        $passStrength += 2 * ($passLength - $upperCount);
    if ($lowerCount > 0)
        $passStrength += 2 * ($passLength - $lowerCount);
    if ($numCount === 0)
        $passStrength -= $passLength;
    if ($upperCount + $lowerCount == 0)
        $passStrength -= $passLength;
    foreach (count_chars($pass, 1) as $i => $val) 
       if ($val > 1)
           $passStrength -= $val; 

    $passStrengthComment = 'Password strength = ' . $passStrength;
}

echo $passStrengthComment;