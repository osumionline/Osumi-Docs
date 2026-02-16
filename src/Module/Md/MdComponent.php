<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Md;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\Tools\OTools;

class MdComponent extends OComponent {
	/**
	 * Descargar archivo .md correspondiente
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$lang   = $req->getParamString('lang');
		$folder = $req->getParamString('folder');
		$file   = $req->getParamString('file');
		if (is_null($lang)) {
			$lang = 'es';
		}
		if ($folder === 'migrations') {
			$file = preg_replace('/(?<=\d)-(?=\d)/', '.', $file);
		}

		$file_md = $this->getConfig()->getDir('ofw_base').'docs/'.$lang.'/'.$folder.'/'.$file.'.md';
		if (file_exists($file_md)) {
      $content = file_get_contents($file_md);
      header('Content-Type: text/markdown; charset=UTF-8');
      header('X-Content-Type-Options: nosniff');

      $mtime = filemtime($file_md);
      if ($mtime !== false) {
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
        header('Cache-Control: public, max-age=600, stale-while-revalidate=86400');
      }

      echo $content;
			exit();
		}
		else {
      header('X-Robots-Tag: noindex');
			OTools::showErrorPage([], '404');
		}
	}
}
