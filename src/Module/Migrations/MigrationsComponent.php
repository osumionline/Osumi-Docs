<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Migrations;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Header\HeaderComponent;
use Osumi\OsumiFramework\App\Component\Nav\NavComponent;

class MigrationsComponent extends OComponent {
	public ?HeaderComponent $header = null;
	public ?NavComponent    $nav    = null;
	public ?string          $lang   = 'es';
  public array            $list   = [];

	public function __construct() {
		parent::__construct();
		$this->header = new HeaderComponent();
		$this->nav    = new NavComponent();
	}

	/**
	 * Migrations page
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->lang = $req->getParamString('lang');
		if (is_null($this->lang)) {
			$this->lang = 'es';
		}
		$this->nav->lang = $this->lang;
		// Enlaces de navegación a otros idiomas
		$this->header->es_link = 'https://framework.osumi.dev/es/migrations';
    $this->header->en_link = 'https://framework.osumi.dev/en/migrations';
		$this->header->eu_link = 'https://framework.osumi.dev/eu/migrations';
    $migrations_path = $this->getConfig()->getDir('ofw_base').'docs/'.$this->lang.'/migrations/*.md';
    $archivos_md = glob($migrations_path);
    rsort($archivos_md);
    foreach ($archivos_md as $archivo) {
      $archivo = basename($archivo);
      $nombre  = str_ireplace('.md', '', $archivo);
      $slug    = str_ireplace('.', '-', $nombre);
      $partes  = explode('-to-', $nombre);
      $this->list[] = [
        'from' => $partes[0],
        'to'   => $partes[1],
        'slug' => $slug
      ];
    }
	}
}
