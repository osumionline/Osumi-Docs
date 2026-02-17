<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Task;

use Osumi\OsumiFramework\Core\OTask;

class PingSearchEnginesTask extends OTask {
  public function __toString() {
    return "pingSearchEngines: Pings Google and Bing with sitemap URL";
  }

  public function run(array $options = []): void {
    $config  = $this->getConfig();
    $baseUrl = rtrim($config->getExtra('base_url'), '/');
    $sitemap = $baseUrl . '/sitemap.xml';

    $targets = [
      'google' => 'https://www.google.com/ping?sitemap=',
      'bing'   => 'https://www.bing.com/ping?sitemap='
    ];

    foreach ($targets as $name => $endpoint) {
      $url = $endpoint . urlencode($sitemap);
      $res = @file_get_contents($url);
      $status = $res !== false ? 'OK' : 'ERROR';
      echo strtoupper($name) . " PING: $status ($url)\n";
    }
  }
}
