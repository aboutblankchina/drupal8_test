<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HelloWorldController implements ContainerInjectionInterface {
  protected $database;
 

/**
   * This method lets us inject the services this class needs.
   * 
   * Only inject services that are actually needed. Which services
   * are needed will vary by the controller.
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('database'));
  }
  public function __construct(Connection $database) {
    $this->database = $database;
  }
 

/**
   * This is the method that will get called, with the services above already available.
   */
  public function hello() {
 return array(
      '#markup' => t('Hello World'),
    );
  }
}