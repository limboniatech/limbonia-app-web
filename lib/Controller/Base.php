<?php

namespace Limbonia\Controller;

class Base implements \Limbonia\Interfaces\Controller
{
  use \Limbonia\Traits\Controller\Base;
  use \Limbonia\Traits\HasApp;

  /**
   * Instantiate a controller
   *
   * @param \Limbonia\App $oApp
   * @param \Limbonia\Router $oRouter (optional)
   */
  protected function __construct(\Limbonia\App $oApp, \Limbonia\Router $oRouter = null)
  {
      $this->baseConstruct($oApp, $oRouter);
  }
}