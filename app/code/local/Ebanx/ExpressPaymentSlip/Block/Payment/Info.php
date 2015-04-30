<?php
class Ebanx_ExpressPaymentSlip_Block_Payment_Info extends Mage_Payment_Block_Info
{
	protected function _construct()
	{
		parent::_construct();
		$this->setTemplate('ebanx/expressPaymentSlip/payment/info.phtml');
	}
}
