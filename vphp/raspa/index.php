<?php
libxml_use_internal_errors(true);

$usuario = $_REQUEST["nome"];

$url = 'https://github.com/'.$usuario; 

$conteudo = file_get_contents($url);

echo $conteudo;



?>