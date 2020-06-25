<?php
namespace Limbonia\Interfaces\Controller;

interface Api
{
  /**
   * Return list of valid http methods
   *
   * @return array
   */
  function getAllowedHttpMethods();

  /**
   * Emit the Allow header containing only methods the current user can access
   */
  public function headerAllowedHttpMethods();

  /**
   * Is the current user valid?
   *
   * @return boolean
   */
  public function validUser();

  /**
   * Process the current API call and return the appropriate data
   *
   * @return mixed
   * @throws \Limbonia\Exception\Web
   */
  public function processApi();
}