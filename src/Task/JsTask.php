<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Task;

use Osumi\OsumiFramework\Core\OTask;

class JsTask extends OTask {
	public function __toString() {
		return "js: Tarea para minimizar todos los archivo JS de la aplicación";
	}

	private function minimizeJsFiles(string $base_path): void {
		// Verificar si la ruta base existe
		if (!is_dir($base_path)) {
			throw new Exception("La ruta especificada no es un directorio válido.");
		}

		// Escanear el directorio actual
		$files = scandir($base_path);

		foreach ($files as $file) {
			// Saltar los directorios especiales "." y ".."
			if ($file === '.' || $file === '..') {
				continue;
			}

			$full_path = $base_path . DIRECTORY_SEPARATOR . $file;

			// Si es un directorio, hacer una llamada recursiva
			if (is_dir($full_path)) {
				$this->minimizeJsFiles($full_path);
			}
			// Si es un archivo .min.js, eliminarlo
			elseif (str_ends_with($file, '.min.js')) {
				unlink($full_path);
				echo "Archivo eliminado: {$full_path}\n";
			}
			// Si es un archivo .js (que no sea .min.js), minimizarlo
			elseif (pathinfo($full_path, PATHINFO_EXTENSION) === 'js') {
				$minimized_path = $base_path . DIRECTORY_SEPARATOR . pathinfo($file, PATHINFO_FILENAME) . '.min.js';
				$this->minimizeJsFile($full_path, $minimized_path);
			}
		}
	}

	private function minimizeJsFile(string $input_path, string $output_path): void {
		// Leer el contenido del archivo JS
		$js = file_get_contents($input_path);

		if ($js === false) {
			throw new Exception("No se pudo leer el archivo: {$input_path}");
		}

		// Minimizar el contenido eliminando espacios, saltos de línea y comentarios
		$minimized = preg_replace(
			[
				'/\s+/',                // Elimina espacios en blanco innecesarios
				'/\/\*.*?\*\//s',       // Elimina comentarios multilinea
				'/\/\/[^\n]*/',         // Elimina comentarios de línea
				'/\s*([{};,:()=])\s*/', // Elimina espacios antes y después de ciertos caracteres
				'/;}/',                 // Elimina puntos y comas antes de llaves de cierre
			],
			[
				' ',                    // Reemplaza múltiples espacios por uno solo
				'',                     // Elimina comentarios multilinea
				'',                     // Elimina comentarios de línea
				'$1',                   // Mantiene los delimitadores limpios
				'}',                    // Optimiza los finales de declaración
			],
			$js
		);

		// Escribir el archivo minimizado
		file_put_contents($output_path, trim($minimized));
		echo "Archivo minimizado creado: {$output_path}\n";
	}

	public function run(array $options = []): void {
		$this->minimizeJsFiles($this->getConfig()->getDir('base'));
	}
}
