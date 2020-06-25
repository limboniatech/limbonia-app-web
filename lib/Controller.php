<?php
namespace Limbonia;

/**
 * Limbonia Controller base class
 *
 * This defines all the basic parts of an Limbonia controller
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class Controller extends Controller\Base
{
  use \Limbonia\Traits\Controller\Api;
  use \Limbonia\Traits\Controller\Admin;

  /**
   * Controller Factory
   *
   * @param string $sType - The type of controller to create
   * @param \Limbonia\App $oApp
   * @return \Limbonia\interfaces\Controller
   */
  public static function factory($sType, \Limbonia\App $oApp)
  {
    return static::driverFactory($sType, $oApp);
  }

  /**
   * Instantiate a controller
   *
   * @param \Limbonia\App $oApp
   */
  protected function __construct(\Limbonia\App $oApp, \Limbonia\Router $oRouter = null)
  {
      $this->baseConstruct($oApp, $oRouter);
      $this->adminConstruct();
  }
}