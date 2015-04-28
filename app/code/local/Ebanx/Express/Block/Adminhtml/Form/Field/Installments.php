<?php
class Ebanx_Express_Block_Adminhtml_Form_Field_Installments extends Mage_Core_Block_Html_Select
{
	public function _toHtml()
	{
		for ($i = 1; $i < 13; $i++) {
			$this->addOption($i, $i);
		}
		return parent::_toHtml();
	}

	public function setInputName($value)
	{
		return $this->setName($valuei);
	}
}
