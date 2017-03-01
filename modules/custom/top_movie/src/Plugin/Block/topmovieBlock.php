<?php

namespace Drupal\top_movie\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 * )
 */
class topmovieBlock extends BlockBase implements BlockPluginInterface{
    
    
   /**
   * {@inheritdoc}
   */  
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['name'])) {
      $name = $config['name'];
    }
    else {
      $name = $this->t('to no one');
    }
    
    if (!empty($config['goodbye'])) {
      $goodbye = $config['goodbye'];
    }
    else {
      $goodbye = $this->t('dark vader');
    }
    return array(
      '#markup' => $this->t('Hello @name! Goodbye @goodbye', array (
            '@name' => $name,
            '@goodbye' => $goodbye,
        )
      ),
    );
  }
  /**
   * {@inheritdoc}
   */
    /*
  public function build() {
    return array(
      '#markup' => $this->t('Hello, Block World!'),
    );
  }
  */
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['hello_block_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['name']) ? $config['name'] : '',
    );
    
    $form['hello_block_goodbye'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Goodbye'),
      '#description' => $this->t('Who do you want to say Goodbye to?'),
      '#default_value' => isset($config['goodbye']) ? $config['goodbye'] : '',
    );

    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['name'] = $form_state->getValue('hello_block_name');
    $this->configuration['goodbye'] = $form_state->getValue('hello_block_goodbye');
  }

    /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('top_movie.settings');
    return array(
      'name' => $default_config->get('topmovie.name'),
      'goodbye' => $default_config->get('topmovie.goodbye')
    );
  }
  
}
