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


    $id = $config['header_logo'];
    $image_url = Media::load($id);

    $menu_name = $config['header_menu'] ?? '';
    $menu_items = [];
    if (!empty($menu_name)) {
      $menu_tree = \Drupal::menuTree();
      $parameters = $menu_tree->getCurrentRouteMenuTreeParameters($menu_name);
      $tree = $menu_tree->load($menu_name, $parameters);
      $manipulators = [
        ['callable' => 'menu.default_tree_manipulators:checkAccess'],
        ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort'],
      ];
      $menu_items = $menu_tree->transform($tree, $manipulators);
    }

    return [
      '#theme' => 'afucentheader',
      '#menu_items' => $menu_items,
      '#logo' => $image_url ?? "FAILED",
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
      'header_menu' => $this->t(''),
      'header_logo' => $this->t('')
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $config = $this->getConfiguration();

    $form['header_menu'] = [
      '#type' => 'select',
      '#title' => $this->t('Select Menu'),
      '#default_value' => $config['header_menu'],
      '#options' => $this->getMenuOptions(),
      '#required' => TRUE,
    ];



    $form['header_logo'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image'),
      '#default_value' => $config['header_logo'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => FALSE,
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
    $this->configuration['header_menu'] = $values['header_menu'];
    $this->configuration['header_logo'] = $values['header_logo'];
  }

  /**
   * Get available menus.
   *
   * @return array
   *   Array of menu options.
   */
  private function getMenuOptions()
  {
    $menu_options = [];
    $menus = \Drupal::entityTypeManager()->getStorage('menu')->loadMultiple();
    foreach ($menus as $menu) {
      $menu_options[$menu->id()] = $menu->label();
    }
    return $menu_options;
  }
}
