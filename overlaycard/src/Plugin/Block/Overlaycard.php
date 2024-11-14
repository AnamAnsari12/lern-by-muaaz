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
    return [
      '#theme' => 'overlaycard',
      '#content1' => $config['content1'],
      '#content2' => $config['content2'],
      '#content3' => $config['content3'],
      '#content4' => $config['content4'],
      '#image1' => "./image.png",
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
    ];

    $form['content2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('first cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content2'],
    ];

    $form['content3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('first cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content3'],
    ];

    $form['content4'] = [
      '#type' => 'textfield',
      '#title' => $this->t('first cards content'),
      '#description' => $this->t('the contetns of first cards content'),
      '#default_value' => $this->configuration['content4'],
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
  }
}
