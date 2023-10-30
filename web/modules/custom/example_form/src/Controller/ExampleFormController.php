<?php

namespace Drupal\example_form\Controller;

use Drupal\Core\Controller\ControllerBase;


 class ExampleFormController extends ControllerBase {
     public function createForm() {
         $email = 'example@gmail.com';
         $form['example_form'] = \Drupal::formBuilder()->getForm('Drupal\example_form\Form\ExampleForm');
         $form['example_form_with_arg'] = \Drupal::formBuilder()->getForm('Drupal\example_form\Form\ExampleForm', $email);
         return $form;
    }
 }

