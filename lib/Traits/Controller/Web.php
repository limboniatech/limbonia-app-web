<?php

namespace Limbonia\Traits\Controller;

trait Web
{
  /**
   * List of components that this controller contains along with their descriptions
   *
   * @var array
   */
  protected static $hComponent =
  [
    'search' => 'This is the ability to search and display data.',
    'edit' => 'The ability to edit existing data.',
    'create' => 'The ability to create new data.',
    'delete' => 'The ability to delete existing data.'
  ];

  /**
   * Return the list of this controller's components
   *
   * @return array
   */
  public static function getComponents()
  {
    return static::$hComponent;
  }
}