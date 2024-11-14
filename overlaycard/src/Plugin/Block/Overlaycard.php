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
    $config = $this->getConfiguration();

    $image_urls = [];

    $ids = $config['image1'];
    $imageLoaded = Media::load($ids);



    return [
      '#theme' => 'overlaycard',
      '#content1' => $config['content1'],
      '#content2' => $config['content2'],
      '#content3' => $config['content3'],
      '#content4' => $config['content4'],
      '#image1' => $imageLoaded,
      '#image2' => "./image.png",
      '#image4' => "./image.png",
      '#image3' => "./image.png",
      '#attached' => [
        'library' => [
          'overlaycard/overlaycard_styles',
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
      'content1' => $this->t(''),
      'content2' => $this->t(''),
      'content3' => $this->t(''),
      'content4' => $this->t(''),
      // 'image1' => $this->t(''),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $form['content1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('first cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content1'],
      '#required' => TRUE,
    ];

    $form['content2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content2'],
      '#required' => TRUE,
    ];

    $form['content3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Third cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content3'],
      '#required' => TRUE,
    ];

    $form['content4'] = [
      '#type' => 'textfield',
      '#title' => $this->t('first cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content4'],
      '#required' => TRUE,
    ];

    $form['image1'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select image'),
      '#description' => 'first card image',
      '#default_value' => $config['image1'],
      '#allowed_bundles' => ['image'],
      '#required' => TRUE,
      '#cardinality' => 1,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $values = $form_state->getValues();
    $this->configuration['content1'] = $values['content1'];
    $this->configuration['content2'] = $values['content2'];
    $this->configuration['content3'] = $values['content3'];
    $this->configuration['content4'] = $values['content4'];
    $this->configuration['image1'] = $values['image1'];
  }
}
