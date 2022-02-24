<?php
//Check Identifier
header("Content-Type: text/plain");

$ident = $_GET['identifier']; 
$errorComment = 'Ok';

if (! isset($ident)) {
  $errorComment = 'Parameter "identifier" is required';
}
elseif ($ident == '') {
  $errorComment = 'None identifier found';
}  
else {
  if (ctype_alpha($ident[0])) {  
    for ($i = 1; $i < strlen($ident); $i++)
      if (!(ctype_alpha($ident[$i]) || is_numeric($ident[$i]))) {
        $errorComment = 'Error at ' . ($i + 1) . ' position. Letter or numeric expected, but "' . $ident[$i] . '" found.';
        break;
      }      
  }
  else {
    $errorComment = 'Error at 1 position. Letter expected, but "' . $ident[0] . '" found.';
  }
}

echo $errorComment;