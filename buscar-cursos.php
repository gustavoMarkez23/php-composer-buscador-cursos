<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once './src/BuscadorCursos.php';

use GustavoMarkez23\BuscadorCursos\BuscadorCurso;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(
  [
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
  ]
);
$crawler = new Crawler();

$buscador = new BuscadorCurso($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
  echo $curso->textContent . PHP_EOL;
}
