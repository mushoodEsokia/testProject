<?php
    /**
    @file
    Contains \Drupal\form_fun\Controller\FirstController.
     */
     
    namespace Drupal\form_fun\Controller;
     
    use Drupal\Core\Controller\ControllerBase;
     
    class FirstController extends ControllerBase {
      public function content() {
     return array(
        '#type' => 'markup',
        '#markup' => t('Hello world'),
      );
      }
    }