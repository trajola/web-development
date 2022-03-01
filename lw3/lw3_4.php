<?php
//Survey Saver

header("Content-Type: text/plain");

$info = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'age' => '',
];

foreach ($info as $parameter => &$value)
    $value = $_GET[$parameter];

if (!isset($info['email'])) 
{
    echo 'Parameter "email" is required.';
}
elseif ($info['email'] === '') {
    echo 'Parameter "email" is not set.';
}
else
{
    $fileName = './data/'.$info['email'].'.txt';
  
    if (file_exists($fileName)) 
    {
        $infoFile = file($fileName);
        if (! isset($info['first_name']))
            $info['first_name'] = trim(substr($infoFile[0], strpos($infoFile[0], ':') + 1));
        if (! isset($info['last_name']))
            $info['last_name'] = trim(substr($infoFile[1], strpos($infoFile[1], ':') + 1));
        if (! isset($info['age']))
            $info['age'] = trim(substr($infoFile[3], strpos($infoFile[3], ':') + 1));
    }
  
    $infoStr = '';
    $infoStr = $infoStr . 'First Name: ' . $info['first_name'] . PHP_EOL;
    $infoStr = $infoStr . 'Last Name: ' . $info['last_name'] . PHP_EOL;
    $infoStr = $infoStr . 'Email: ' . $info['email'] . PHP_EOL;
    $infoStr = $infoStr . 'Age: ' . $info['age'] . PHP_EOL;
  
    $successWriting = file_put_contents($fileName, $infoStr, 0);
    if ($successWriting) 
    {
        echo 'Data has been written to file '.$fileName.' !';
    }
    else 
    {
        echo 'Error writing to file '.$fileName.' !';
    }
}

  
