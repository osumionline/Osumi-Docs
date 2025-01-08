<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Task;

use Osumi\OsumiFramework\Core\OTask;

class CssTask extends OTask {
	public function __toString() {
		return "css: Tarea para minimizar todos los archivo CSS de la aplicación";
	}

	private function minimizeCssFiles(string $base_path): void {
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
				$this->minimizeCssFiles($full_path);
			}
			// Si es un archivo .min.css, eliminarlo
			elseif (str_ends_with($file, '.min.css')) {
				unlink($full_path);
				echo "Archivo eliminado: {$full_path}\n";
			}
			// Si es un archivo .css (que no sea .min.css), minimizarlo
			elseif (pathinfo($full_path, PATHINFO_EXTENSION) === 'css') {
				$minimized_path = $base_path . DIRECTORY_SEPARATOR . pathinfo($file, PATHINFO_FILENAME) . '.min.css';
				$this->minimizeCssFile($full_path, $minimized_path);
			}
		}
	}

	private function minimizeCssFile(string $input_path, string $output_path): void {
		// Leer el contenido del archivo CSS
		$css = file_get_contents($input_path);

		if ($css === false) {
			throw new Exception("No se pudo leer el archivo: {$input_path}");
		}

		// Minimizar el contenido eliminando espacios, saltos de línea y comentarios
		$minimized = preg_replace(
			[
				'/\s+/',                // Elimina espacios en blanco innecesarios
				'/\/\*.*?\*\//s',       // Elimina comentarios
				'/\s*([{};,:])\s*/',    // Elimina espacios antes y después de ciertos caracteres
				'/;}/',                 // Elimina puntos y comas antes de llaves de cierre
			],
			[
				' ',                    // Reemplaza múltiples espacios por uno solo
				'',                     // Elimina comentarios
				'$1',                   // Mantiene los delimitadores limpios
				'}',                    // Optimiza los finales de declaración
			],
			$css
		);

		// Escribir el archivo minimizado
		file_put_contents($output_path, trim($minimized));
		echo "Archivo minimizado creado: {$output_path}\n";
	}

	public function run(array $options = []): void {
		$this->minimizeCssFiles($this->getConfig()->getDir('base'));
	}
}
