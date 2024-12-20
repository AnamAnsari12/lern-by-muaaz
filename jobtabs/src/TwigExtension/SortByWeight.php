<?php

namespace Drupal\jobtabs\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class to provide a sort by '#weight' for arrays within Twig.
 */
class SortByWeight extends AbstractExtension {

  /**
   * Generates a list of all Twig filters that this extension defines.
   */
  public function getFilters() {
    return [
      new TwigFilter('sortbyweight', [$this, 'performSort']),
    ];
  }

  /**
   * Register the name of our service.
   */
  public function getName() {
    return 'jobtabs.twig_extension';
  }

  /**
   * Actually perform the sort.
   */
  public static function performSort($array) {
    if (!is_array($array)) {
      return $array;
    }
    uasort($array, function ($item1, $item2) {
      if (!isset($item1['#weight']) || !isset($item2['#weight'])) {
        return 1;
      }
      if (empty($item1['#weight']) || empty($item2['#weight'])) {
        return 0;
      }
      if ($item1['#weight'] == $item2['#weight']) {
        return 0;
      }
      return $item1['#weight'] < $item2['#weight'] ? -1 : 1;
    });

    return $array;
  }

}
