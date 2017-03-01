<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\top_movie\Controller;

use \Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\HttpFoundation\Request;

Class defaultController extends ControllerBase{
    public function show(Request $request){
      return array(
          '#type' => 'markup',
          '#markup' => $this->t('Hello, World!'),
        );
    }
}