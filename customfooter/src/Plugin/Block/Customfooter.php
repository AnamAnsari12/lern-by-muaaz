<?php

namespace Drupal\customfooter\Plugin\Block;

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
  id: "customfooter_block",
  admin_label: new TranslatableMarkup("customfooter block"),
  category: new TranslatableMarkup("customfooter")
)]
class Customfooter extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $config = $this->getConfiguration();




    $menu_name = $config['customfooter_menu'] ?? '';
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
    $urls = [];

    foreach ($menu_items as $element) {
      $link = $element->link;
      $title = $link->getTitle();
      $url = $link->getUrlObject();
      $url_string = $url->toString();
      if ($link->isEnabled()) {
        $urls[$title] = $url_string;
      }
    }


    $id1 = $config['customfooter_icon1'];
    if ($id1) {
      $footericon1 = Media::load($id1);
    }

    $id2 = $config['customfooter_icon2'];
    if ($id2) {
      $footericon2 = Media::load($id2);
    }

    $id3 = $config['customfooter_icon3'];
    if ($id3) {
      $footericon3 = Media::load($id3);
    }

    $id4 = $config['customfooter_icon4'];
    if ($id4) {
      $footericon4 = Media::load($id4);
    }




    return [
      '#theme' => 'customfooter',
      '#menu_items' => $urls,
      '#customfooter_icon1' =>  $footericon1,
      '#customfooter_link1' => $config['customfooter_iconlink1'],
      '#customfooter_icon2' =>  $footericon2,
      '#customfooter_link2' => $config['customfooter_iconlink2'],
      '#customfooter_icon3' =>  $footericon3,
      '#customfooter_link3' => $config['customfooter_iconlink3'],
      '#customfooter_icon4' =>  $footericon4,
      '#customfooter_link4' => $config['customfooter_iconlink4'],
      '#content' => $config['customfooter_content'],
      '#attached' => [
        'library' => [
          'customfooter/customfooter_styles',

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
      'customfooter_menu' => $this->t(''),
      'customfooter_content' => $this->t(''),
      'customfooter_iconlink1' => $this->t(''),
      'customfooter_iconlink2' => $this->t(''),
      'customfooter_iconlink3' => $this->t(''),
      'customfooter_iconlink4' => $this->t(''),
      // 'customfooter_icon' => $this->t(''),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $config = $this->getConfiguration();

    $form['customfooter_menu'] = [

      '#type' => 'select',
      '#title' => $this->t('Select Menu'),
      '#default_value' => $config['customfooter_menu'],
      '#options' => $this->getMenuOptions(),
      '#required' => TRUE,
    ];
    $form['customfooter_content'] = [

      '#type' => 'textarea',
      '#title' => $this->t('content'),
      '#default_value' => $config['customfooter_content'],
      '#required' => TRUE,
    ];


    $form['customfooter_icon1'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image'),
      '#default_value' => $this->configuration['customfooter_icon1'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => FALSE,
      '#cardinality' => 1,

    ];

    $form['customfooter_icon2'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image'),
      '#default_value' => $this->configuration['customfooter_icon2'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => FALSE,
      '#cardinality' => 1,

    ];
    $form['customfooter_icon3'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image'),
      '#default_value' => $this->configuration['customfooter_icon3'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => FALSE,
      '#cardinality' => 1,

    ];
    $form['customfooter_icon4'] = [
      '#type' => 'media_library',
      '#title' => $this->t('Select Image'),
      '#default_value' => $this->configuration['customfooter_icon4'],
      '#allowed_bundles' => ['image'], // Ensure this matches your media bundle
      '#required' => FALSE,
      '#cardinality' => 1,

    ];



    $form['customfooter_iconlink1'] = [
      '#type' => 'url',
      '#title' => $this->t('inser url'),
      '#default_value' => $config['customfooter_iconlink1'],
      '#required' => FALSE,


    ];

    $form['customfooter_iconlink2'] = [
      '#type' => 'url',
      '#title' => $this->t('inser url'),
      '#default_value' => $config['customfooter_iconlink2'],
      '#required' => FALSE,


    ];
    $form['customfooter_iconlink3'] = [
      '#type' => 'url',
      '#title' => $this->t('inser url'),
      '#default_value' => $config['customfooter_iconlink3'],
      '#required' => FALSE,


    ];
    $form['customfooter_iconlink4'] = [
      '#type' => 'url',
      '#title' => $this->t('inser url'),
      '#default_value' => $config['customfooter_iconlink4'],
      '#required' => FALSE,


    ];



    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $values = $form_state->getValues();
    $this->configuration['customfooter_menu'] = $values['customfooter_menu'];
    // $this->configuration['customfooter_logo'] = $values['customfooter_logo'];
    $this->configuration['customfooter_content'] = $values['customfooter_content'];
    $this->configuration['customfooter_icon1'] = $values['customfooter_icon1'];
    $this->configuration['customfooter_icon2'] = $values['customfooter_icon2'];
    $this->configuration['customfooter_icon3'] = $values['customfooter_icon3'];
    $this->configuration['customfooter_icon4'] = $values['customfooter_icon4'];
    $this->configuration['customfooter_iconlink1'] = $values['customfooter_iconlink1'];
    $this->configuration['customfooter_iconlink2'] = $values['customfooter_iconlink2'];
    $this->configuration['customfooter_iconlink3'] = $values['customfooter_iconlink3'];
    $this->configuration['customfooter_iconlink4'] = $values['customfooter_iconlink4'];
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
