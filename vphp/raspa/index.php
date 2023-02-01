<?php
libxml_use_internal_errors(true);

$conteudo = file_get_contents('https://github.com/cristianopimenta');

echo $conteudo;



?>