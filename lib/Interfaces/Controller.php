<?php
namespace Limbonia\Interfaces;

interface Controller
{
  /**
   * Activate this controller and any required dependencies then return a list of types that were activated
   *
   * @param array $hActiveController - the active controller list
   * @return array
   * @throws \Limbonia\Exception on failure
   */
  function activate(array $hActiveController);

  /**
   * Do whatever setup is needed to make this controller work...
   *
   * @throws \Limbonia\Exception on failure
   */
  function setup();

  /**
   * Deactivate this controller then return a list of types that were deactivated
   *
   * @param array $hActiveController - the active controller list
   * @return array
   * @throws \Limbonia\Exception on failure
   */
  function deactivate(array $hActiveController);

  /**
   * Generate and return the URI for the specified parameters
   *
   * @param string ...$aParam (optional) - List of parameters to place in the URI
   * @return string
   */
  function generateUri(string ...$aParam): string;
}