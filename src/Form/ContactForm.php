<?php

/**
 * @file
 * Contains Drupal\example\Form\ContactForm.
 */
 
 namespace Drupal\example\Form;

 use Drupal\Core\Form\ConfigFormBase;
 use Drupal\Core\Form\FormStateInterface;

 class ContactForm extends ConfigFormBase {
   /**
    * {@inheritdoc}
    */
    protected function getEditableConfigNames() {
      return [
        'example.adminsettings',
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
      return 'contact_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
       $config = $this->config('example.adminsettings');

       $form['first_name'] = [
         '#type' => 'textfield',
         '#title' => $this->t('First Name'),
         '#description' => $this->t('Enter your first name'),
         '#default_value' => $config->get('first_name'),
       ];

      $form['last_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Last Name'),
        '#description' => $this->t('Enter your last name'),
        '#default_value' => $config->get('last_name')
      ];

       return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
       parent::submitForm($form, $form_state);

       $this->config('example.adminsettings')
         ->set('first_name', $form_state->getValue('first_name'))
         ->set('last_name', $form_state->getValue('last_name'))
         ->save();
    }
 }