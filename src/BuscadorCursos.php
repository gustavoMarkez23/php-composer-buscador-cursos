<?php

namespace Gustavo\PhpComposerBuscadorCursos;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorCursos
{
  private Client $httpClient;
  private Crawler $crawler;
  public function __construct(ClientInterface $httpClient, Crawler $crawler)
  {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function buscar(string $url): array
  {
    $cursos = [];
    
    $response = $this->httpClient->request('GET', $url);
    $html = $response->getBody();
    $this->crawler->addHtmlContent($html);
    $elemets = $this->crawler->filter('span.card-curso__nome');
    foreach($elemets as $el){
      $cursos[] = $el;
    }

    return $cursos;
  }
}
