<?php

namespace Drupal\afucentheader\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\media\Entity\Media;


/**
 * Provides a 'My Custom header' block.
 */
#[Block(
  id: "afucentheader_block",
  admin_label: new TranslatableMarkup("afucentheader block"),
  category: new TranslatableMarkup("Maaz World")
)]
class Afucentheader extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $config = $this->getConfiguration();

    $image_urls = [];
   
    $ids = explode(",", $config['afucentheader_images']);
    if (!empty($config['afucentheader_images'])) {
      foreach ($ids as $media_id) {
        $image_urls[] = Media::load($media_id);
      }
    }
    


    return [
      '#theme' => 'afucentheader',
      '#title' => $config['afucentheader_title'],
      '#images' => $image_urls ?? "FAILED",
      '#attached' => [
        'library' => [
          'afucentheader/afucentheader_styles',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    return [
      'afucentheader_title' => $this->t(''),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $config = $this->getConfiguration();

    $form['afucentheader_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Block Title'),
      '#default_value' => $this->configuration['afucentheader_title'] ?? '',
    ];

   

    $form['marquee_images'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image'),
      '#default_value' => $config['afucentheader_images'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => TRUE,
      '#cardinality' => FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED,
    
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $values = $form_state->getValues();
    $this->configuration['afucentheader_title'] = $values['marquee_title'];
    $this->configuration['afucentheader_images'] = $values['marquee_images'];

    }
}
