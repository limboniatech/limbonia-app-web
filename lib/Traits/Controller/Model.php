<?php
namespace Limbonia\Traits\Controller;

/**
 * Limbonia ModelController Trait
 *
 * This trait allows an inheriting controller to use an model
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
trait Model
{
  use \Limbonia\Traits\Controller\BaseModel;
  use \Limbonia\Traits\Controller\AdminModel;
  use \Limbonia\Traits\Controller\ApiModel;
}