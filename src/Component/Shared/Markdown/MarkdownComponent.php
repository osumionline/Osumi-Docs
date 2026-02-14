<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Shared\Markdown;

use Osumi\OsumiFramework\Core\OComponent;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class MarkdownComponent extends OComponent {
  public string $lang  = 'es';
  public string $file  = '';
  public string $html  = '';
  public string $error = '';

  public string $prism_copy = '';
  public string $prism_success = '';
  public string $prism_error = '';

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

  public function run(): void {
    $this->prism_copy    = $this->translations[$this->lang]['copy'];
    $this->prism_success = $this->translations[$this->lang]['success'];
    $this->prism_error   = $this->translations[$this->lang]['error'];

    if ($this->file === '') {
      $this->error = 'Missing doc path.';
      return;
    }

    if (!is_file($this->file)) {
      $this->error = 'Document not found.';
      return;
    }

    $markdown = file_get_contents($this->file);
    if ($markdown === false) {
      $this->error = 'Unable to read markdown file.';
      return;
    }

    $converter = new GithubFlavoredMarkdownConverter([
      'html_input' => 'escape',
      'allow_unsafe_links' => false,
    ]);

    $this->html = (string) $converter->convert($markdown);
  }
}
