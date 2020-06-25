<?php
namespace Limbonia\Traits\Controller;

/**
 * Limbonia ModelController Trait
 *
 * This trait allows an inheriting controller to use a model
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
trait BaseModel
{
  use \Limbonia\Traits\HasType;

  /**
   * The type of Model that this controller uses
   *
   * @var string
   */
  protected $sModelType = '';

  /**
   * The model object associated with this controller
   *
   * @var \Limbonia\Model
   */
  protected $oModel = null;

  /**
   * Do whatever setup is needed to make this controller work...
   */
  public function setup()
  {
    $this->oModel->setup();
  }

  /**
   * Initialize this controller's custom data, if there is any
   *
   * @throws \Limbonia\Exception
   */
  protected function init()
  {
    if (empty($this->sModelType))
    {
      $this->sModelType = static::type();
    }

    $sModelDriver = \Limbonia\Model::driver($this->sModelType);

    if (empty($sModelDriver))
    {
      throw new \Limbonia\Exception("Driver for type ($this->sModelType) not found");
    }

    $this->oModel = $this->oApp->modelFactory($this->sModelType);

    if (isset($this->oRouter->id) && strtolower($this->getType()) == $this->oRouter->controller)
    {
      $this->oModel->load($this->oRouter->id);
    }

    if ($this->oModel->id > 0)
    {
      $this->hMenuItems['model'] = 'Model';
      $this->aAllowedActions[] = 'model';
    }
  }

  /**
   * Return the model object stored for use with this controller
   *
   * @return \Limbonia\Model
   */
  public function getModel()
  {
    return $this->oModel;
  }

  protected function modelFromArray($hModel)
  {
    $sTable = $this->oModel->getTable();
    $sIdColumn = strtolower($this->oModel->getIDColumn());
    $hLowerModel = \array_change_key_case($hModel, CASE_LOWER);

    if (isset($hLowerModel['id']))
    {
      unset($hLowerModel['id']);
    }

    if (isset($hLowerModel[$sIdColumn]))
    {
      unset($hLowerModel[$sIdColumn]);
    }

    return $this->oApp->modelFromArray($sTable, $hLowerModel);
  }
}