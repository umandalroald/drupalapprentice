<?php

namespace Drupal\example\Plugin\Block;

use Drupal\Core\Block\Blockbase;

/**
 * Provides a 'Example' block.
 * 
 * @Block(
 *   id = "example_block",
 *   admin_label = @Translation("Example block"),
 * )
 */
  class ExampleBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
      
      $name = \Drupal::currentUSer()->getDisplayName();
      
      return [
        '#markup' => $this->t('Hello @name', ['@name' => $name]),
      ];
    }
  }