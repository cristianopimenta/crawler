<?php
require 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

// Cria uma nova instância do cliente Goutte



$nomeUsuario = $_REQUEST["nome"];


$client = new Client();

// Define o URL do perfil do GitHub que deseja raspar
$url = 'https://github.com/' . $nomeUsuario;
$iUsuario = '';

// Faz uma solicitação GET para o URL e armazena a resposta em uma variável
$crawler = $client->request('GET', $url);

// Extrai o nome do usuário
$user_name = $crawler->filter('span.p-name.vcard-fullname.d-block.overflow-hidden')->text();
echo 'Nome do usuário: ' . $user_name . "\n";

// Extrai a nickname
$apelido = $crawler->filter('span.p-nickname.vcard-username.d-block')->text();
echo 'Apelido: ' . $apelido . "\n";

$biog = $crawler->filter('div.p-note.user-profile-bio.mb-3.js-user-profile-bio.f4')->text();
echo 'Bio: ' . $biog . "\n";

// Extrai o número de seguidores
$followers = $crawler->filter('a.Link--secondary.no-underline.no-wrap[href="https://github.com/'. $nomeUsuario .'?tab=followers"]')->text();  
echo 'Número de seguidores: ' . $followers . "\n";

// Extrai o número de pessoas que o usuário está seguindo
$following = $crawler->filter('a.Link--secondary.no-underline.no-wrap[href="https://github.com/'. $nomeUsuario .'?tab=following"]')->text();
echo 'Número de pessoas seguindo: ' . $following . "\n";

/*$stars = $crawler->filter('a[href$="/stargazers"]')->text();
echo "O usuário " . $nomeusuario . " tem " . $stars . " estrelas."

$star_element = $crawler->filter('.js-social-count');
$star_count = trim($star_element->text());

echo "O usuário " . $nomeUsuario . " tem " . $star_count . " estrelas. \n";

este nao consegui resolver ainda.


*/


$image_element = $crawler->filter('img.avatar-user');
$image_url = $image_element->attr('src');

$contributions_element = $crawler->filter('.js-calendar-graph-svg > g:last-child rect');
$contributions = $contributions_element->count();


echo "O usuário " . $nomeUsuario . " tem " . $contributions . " contribuições \n";

echo "A URL da imagem do perfil do usuário " . $nomeUsuario . " é: " . $image_url . "\n"; 










