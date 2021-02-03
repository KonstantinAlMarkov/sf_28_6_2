<?php
interface ICommand
{
  function onCommand($name);
}
 
class DiscountCommandChain
{
  private $_commands = array(); 
  public function addCommand( $cmd )
  {
    $this->_commands []= $cmd;
  }
 
  public function runCommand($name)
  {
    foreach( $this->_commands as $cmd)
    {
      if ( $cmd->onCommand($name) )
        return;
    }
  }
}
 
class PercentDiscount implements ICommand
{
  public function onCommand($type)
  {
    if ($type==0)
    {
        echo "Возможно применение скидки на процент".'</br>';
    }
    else echo  "Применение процентной скидки невозможно".'</br>';
  }
}
 
class DeliveryDiscount implements ICommand
{
  public function onCommand($type)
  {
    if ($type==1)
    {
        echo "Возможно применение скидки на доставку".'</br>';
    }
    else 
    {
        echo  "Применение скидки по доставке невозможно ".'</br>';
    }
  }
}
 