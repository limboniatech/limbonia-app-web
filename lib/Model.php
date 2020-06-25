<?php
namespace Limbonia;

/**
 * Limbonia Model Class
 *
 * This is a wrapper around the around a row of model data that allows access to
 * the data
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class Model implements \ArrayAccess, \Countable, \SeekableIterator
{
  use \Limbonia\Traits\HasApp;
  use \Limbonia\Traits\Item
  {
    __get as protected magicGet;
  }
  
    /**
     * Generate an item list based on the specified type and SQL query
     *
     * @param string $sType
     * @param string $sQuery
     * @param\Limbonia\Database $oDatabase (optional)
     * @return\Limbonia\ModelList
     */
    public static function getList($sType, $sQuery,\Limbonia\Database $oDatabase = null)
    {
      $oDatabase = $oDatabase instanceof \Limbonia\Database ? $oDatabase : \Limbonia\Database::getDB();
      $oList = new \Limbonia\ModelList($sType, $oDatabase->query($sQuery));
      $oList->setDatabase($oDatabase);
      return $oList;
    }

  /**
   * Get the specified data
   *
   * @param string $sName
   * @return mixed
   */
  public function __get($sName)
  {
    $xGet = $this->magicGet($sName);

    //if the returned data is a Model and we have a valid App
    if ($xGet instanceof Model && $this->oApp instanceof App)
    {
      //then set the App in the Model
      $xGet->setApp($this->oApp);
    }

    return $xGet;
  }
}