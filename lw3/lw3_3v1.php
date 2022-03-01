<?php
//Password Strength
header("Content-Type: text/plain");

$pass = $_GET['password'];
$passStrengthComment = '';

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
    $upperCount = 0;
    for ($i = 0; $i < strlen($pass); $i++)
    {
        if (ctype_lower($pass[$i]))
            $lowerCount += 1;
        if (ctype_upper($pass[$i]))
            $upperCount += 1;
    }
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
    $passStrength -= 2 * ($passLength - strlen(count_chars($pass, 3)));

    $passStrengthComment = 'Password strength = ' . $passStrength;
}

echo $passStrengthComment;