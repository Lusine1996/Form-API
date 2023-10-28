<?php

namespace Drupal\example_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides  "Example form" form.
 */

class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {

    return 'example_form';

  }

  /**
   *{@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $email = NULL) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
      '#value' => $email,
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#required' => TRUE,
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $email = $form_state->getValue('email');


    // Use Drupal's built-in email validation.
    if (!\Drupal::service('email.validator')
      ->isValid($email)) {
      $form_state->setErrorByName('email', $this->t('Please enter a valid email address.'));
    }
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
\Drupal::messenger()->addMessage ($this->t('Form submitted. Name: @name, Email: @email, Message: @message', [
  '@name' => $form_state->getValue('name'),
  '@email' => $form_state->getValue('email'),
  '@message' => $form_state->getValue('message')

])

);
  }
}
