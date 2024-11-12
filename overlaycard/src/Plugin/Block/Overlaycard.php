<?php

namespace Drupal\overlaycard\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\media\Entity\Media;


/**
 * Provides a 'My Custom Block' block.
 */
#[Block(
  id: "overlaycard_block",
  admin_label: new TranslatableMarkup("Overlay Card block"),
  category: new TranslatableMarkup("Overlay Card World")
)]
class Overlaycard extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    return [
      '#theme' => 'overlaycard',
      '#title' => "ANAM PYARI",
      '#images' => "BANNER",
      '#attached' => [
        'library' => [
          'overlaycard/overlaycard_styles',
        ],
      ],
    ];
  }
}
