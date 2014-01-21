<?php

/**
 * @file
 * Definition of Drupal\hello_world\HelloWorldFormController.
 */

namespace Drupal\hello_world;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\ContentEntityFormController;
use Drupal\Core\Language\Language;
use Drupal\Component\Utility\String;

/**
 * Form controller for the node edit forms.
 */
class HelloWorldFormController extends ContentEntityFormController {
  
  public function form(array $form, array &$form_state) {
    $form = parent::form($form, $form_state); $entity = $this->entity;

    $form['#title'] = '这里写入网页标题';

    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => $entity->title->value,
    );

    // 如果要用模板输出。则这样调用
    $form['#theme'] = 'hello_world_form';
    return $form;
  }

  public function save(array $form, array &$form_state) { 
    $entity = $this->entity;
    $entity->save();
    drupal_set_message("hello saved");
  }

  public function delete(array $form, array &$form_state) { 
    $entity = $this->entity;
    $entity->delete();
    drupal_set_message("hello has been deleted."); 
    $form_sate['redirect_route']['route_name'] = '<front>';
  }

}
