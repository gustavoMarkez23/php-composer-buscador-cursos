#!/usr/bin/env php
<?php

use GustavoMarkez23\PhpComposerBuscadorCursos\BuscadorCursos;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client(
  [
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
  ]
);
$crawler = new Crawler();

$buscador = new BuscadorCursos($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
  exibirMensagem($curso);
}
