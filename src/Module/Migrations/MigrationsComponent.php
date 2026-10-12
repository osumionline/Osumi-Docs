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

		foreach ($archivos_md as $archivo) {
		  $nombre = basename($archivo, '.md');
		  $partes = explode('-to-', $nombre);
		  if (count($partes) !== 2) {
		    continue; // ignora archivos que no sigan el patrón "X-to-Y"
		  }
		  $this->list[] = [
		    'from' => $partes[0],
		    'to'   => $partes[1],
		    'slug' => str_replace('.', '-', $nombre)
		  ];
		}

		usort($this->list, fn(array $a, array $b): int =>
		  version_compare($b['to'], $a['to']) ?: version_compare($b['from'], $a['from'])
		);
	}
}
