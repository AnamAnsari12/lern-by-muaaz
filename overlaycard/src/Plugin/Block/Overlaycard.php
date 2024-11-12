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
 * 
 * provides the overlayblock.
 * @Block(
 *  id= "overlaycard",
 *  admin_label=@Translation("overlaycard")
 * )
 * 
 */
class Overlaycard extends BlockBase{
    /**
   * {@inheritdoc}
   */
  public function build(){
    return [
        '#type' => 'markup',

    ];
  }
}

?>