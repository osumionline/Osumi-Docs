<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Markdown;

use Osumi\OsumiFramework\Core\OComponent;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class MarkdownComponent extends OComponent {
  public string $lang    = 'es';
  public string $file    = '';
  public string $content = '';
  public string $html    = '';
  public string $error   = '';

  // Campos SEO que añadimos
  public string $title       = '';
  public string $description = '';
  public array  $headings    = [];
  public string $lastmod     = '';

  public string $prism_copy    = '';
  public string $prism_success = '';
  public string $prism_error   = '';

  private array $translations = [
    'en' => [
      'copy'    => 'Copy',
      'success' => 'Copied!',
      'error'   => 'Press Ctrl+C to copy'
    ],
    'es' => [
      'copy'    => 'Copiar',
      'success' => '¡Copiado!',
      'error'   => 'Pulsa Ctrl+C para copiar'
    ],
    'eu' => [
      'copy'    => 'Kopiatu',
      'success' => 'Kopiatuta!',
      'error'   => 'Sakatu Ctrl+C kopiatzeko'
    ],
  ];

  public function validate(): bool {
    if ($this->file === '') {
      $this->error = 'Missing doc path.';
      return false;
    }
    if (!is_file($this->file)) {
      $this->error = 'Document not found.';
      return false;
    }
    return true;
  }

  public function loadFile(): bool {
    // Validar file
    if (!$this->validate()) {
      return false;
    }

    // Leer markdown
    $markdown = file_get_contents($this->file);
    if ($markdown === false) {
      $this->error = 'Unable to read markdown file.';
      return false;
    }

    $this->content = $markdown;

    // === CAMPOS SEO ===
    $this->title       = $this->extractTitle($this->content);
    $this->description = $this->extractDescription($this->content);
    $this->headings    = $this->extractHeadings($this->content);
    $this->lastmod     = date('Y-m-d', filemtime($this->file));

    return true;
  }

  public function run(): void {
    // Traducciones Prism
    $this->prism_copy    = $this->translations[$this->lang]['copy'];
    $this->prism_success = $this->translations[$this->lang]['success'];
    $this->prism_error   = $this->translations[$this->lang]['error'];

    // Cargar file
    if (!$this->loadFile()) {
      return;
    }

    // === RENDER MARKDOWN ===
    $converter = new GithubFlavoredMarkdownConverter([
      'html_input'         => 'escape',
      'allow_unsafe_links' => false,
    ]);
    $this->html = (string) $converter->convert($this->content);
  }


  /** -------------------------------------------
   * 1) Extraer título (# ...)
   * ------------------------------------------- */
  private function extractTitle(string $md): string {
    if (preg_match('/^#\s+(.+)$/m', $md, $m)) {
      return trim($m[1]);
    }
    return 'Untitled';
  }

  /** -------------------------------------------
   * 2) Extraer descripción (primer párrafo útil)
   * ------------------------------------------- */
  private function extractDescription(string $md): string {
    $lines = preg_split("/\R/", $md);
    $foundTitle = false;

    foreach ($lines as $line) {
      $trim = trim($line);

      if (!$foundTitle && preg_match('/^#\s+/', $trim)) {
        // hemos encontrado el título
        $foundTitle = true;
        continue;
      }

      if ($foundTitle && $trim !== '' && !str_starts_with($trim, '#')) {
        return mb_substr($trim, 0, 240);
      }
    }

    return '';
  }

  /** -------------------------------------------
   * 3) Extraer headings deduplicadas
   * ------------------------------------------- */
  private function extractHeadings(string $md): array {
    preg_match_all('/^##\s+(.+)$/m', $md, $h2);
    preg_match_all('/^###\s+(.+)$/m', $md, $h3);

    $raw = array_merge($h2[1] ?? [], $h3[1] ?? []);
    $result = [];
    $seen = [];

    foreach ($raw as $h) {
      $norm = trim($h);
      $norm = preg_replace('/\s+/u', ' ', $norm);
      $norm = str_replace('`', '', $norm);

      $key = mb_strtolower($norm);
      if ($norm !== '' && !isset($seen[$key])) {
        $result[] = $norm;
        $seen[$key] = true;
      }
    }

    return $result;
  }
}
