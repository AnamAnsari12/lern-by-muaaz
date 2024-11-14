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
      'content1' => "content1",
      'content2' => "content2",
      'content3' => "content3",
      'content4' => "content4",
      'image1' => "./image.png",
      'image2' => "./image.png",
      'image4' => "./image.png",
      'image3' => "./image.png",
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
      'content1' => $this->t(""),
      'content2' => $this->t(""),
      'content3' => $this->t(""),
      'content4' => $this->t(""),
      'image1' => $this->t(""),
      'image2' => $this->t(""),
      'image3' => $this->t(""),
      'image4' => $this->t(""),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $config = $this->getConfiguration();

    $form['content1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('content1'),
      '#default_value' => $this->configuration['content1'] ?? '',
    ];

    $form['content2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('content2'),
      '#default_value' => $this->configuration['content2'] ?? '',
    ];

    $form['content3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('content3'),
      '#default_value' => $this->configuration['content3'] ?? '',
    ];

    $form['content4'] = [
      '#type' => 'textfield',
      '#title' => $this->t('content4'),
      '#default_value' => $this->configuration['content4'] ?? '',
    ];

    // $form['marqueecontent'] = [
    //   '#type' => 'textarea',
    //   '#title' => $this->t('Block Content'),
    //   '#default_value' => $config['marquee_content'] ?? '',
    // ];

    $form['image1'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image1'),
      '#default_value' => $config['image1'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => TRUE,
      '#cardinality' => 1,
      // '#target_type' => 'media',
      // '#settings' => [
      //   'display' => 'content', // Adjust this to your desired view mode
      // ]
      // '#upload_location' => 'public://marquee_images/',
      // '#default_value' => $config['marquee_images'] ?? [],
      // '#multiple' => TRUE,
      // '#upload_validators' => [
      //   'file_validate_extensions' => ['png jpg jpeg'],
      // ],
    ];

    $form['image2'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image2'),
      '#default_value' => $config['image2'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => TRUE,
      '#cardinality' => 1,
    ];
    $form['image3'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image3'),
      '#default_value' => $config['image3'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => TRUE,
      '#cardinality' => 1,
    ];
    $form['image4'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image4'),
      '#default_value' => $config['image4'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
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
    $this->configuration['image2'] = $values['image2'];
    $this->configuration['image3'] = $values['image3'];
    $this->configuration['image4'] = $values['image4'];

    // $this->setConfigurationValue('marquee_title', $form_state->getValue('marquee_title'));
    // $this->setConfigurationValue('marquee_content', $form_state->getValue('marquee_content'));

    // $images = $form_state->getValue('marquee_images');
    // if ($images) {
    //   foreach ($images as $fid) {
    //     $file = File::load($fid);
    //     if ($file) {
    //       $file->setPermanent();
    //       $file->save();
    //     }
    //   }
    // }
    // $this->setConfigurationValue('marquee_images', $images);
  }
}
