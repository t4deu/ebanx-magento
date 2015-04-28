<?php
class Ebanx_Express_Block_Adminhtml_Custominterest  extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
	protected $_itemRenderer;

	public function _prepareToRender()
	{
		$this->addColumn('installments', array(
			'label' => Mage::helper('adminhtml')->__('Installments'),
			'renderer' => $this->_getRenderer(),
		));
		$this->addColumn('interest', array(
			'label' => Mage::helper('adminhtml')->__('Interest'),
			'style' => 'width:100px',
		));
		$this->_addAfter = false;
		$this->_addButtonLabel = Mage::helper('adminhtml')->__('Add');
	}

	protected function  _getRenderer() 
	{
		if (!$this->_itemRenderer) {
			$this->_itemRenderer = $this->getLayout()->createBlock(
				'ebanx_express/adminhtml_form_field_installments', '',
				array('is_render_to_js_template' => true)
			);
		}
		return $this->_itemRenderer;
	}

	protected function _prepareArrayRow(Varien_Object $row)
	{
		$row->setData(
			'option_extra_attr_' . $this->_getRenderer()
			->calcOptionHash($row->getData('installments')),
				'selected="selected"'
			);
	}
}
