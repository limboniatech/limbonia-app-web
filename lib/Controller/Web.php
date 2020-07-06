<?php
namespace Limbonia\Controller;

/**
 * Limbonia Controller Web class
 *
 * This defines all the basic parts of an Limbonia controller
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class Web extends Base implements \Limbonia\Interfaces\Controller\Api
{
  use \Limbonia\Traits\Controller\Web;
  use \Limbonia\Traits\DriverList;

  /**
   * Controller Factory
   *
   * @param string $sType - The type of controller to create
   * @param \Limbonia\App\Web $oApp
   * @return \Limbonia\Interfaces\Controller\Web
   */
  public static function factory($sType, \Limbonia\App\Web $oApp)
  {
    return static::driverFactory($sType, $oApp);
  }

  /**
   * Instantiate an API controller
   *
   * @param \Limbonia\App\Web $oApp
   * @param \Limbonia\Router $oRouter (optional)
   */
  protected function __construct(\Limbonia\App\Web $oApp, \Limbonia\Router $oRouter = null)
  {
      parent::__construct($oApp, $oRouter);
  }
}