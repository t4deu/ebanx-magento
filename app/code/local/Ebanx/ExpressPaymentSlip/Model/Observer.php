<?php

/**
 * Copyright (c) 2014, EBANX Tecnologia da Informação Ltda.
 *  All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this
 * list of conditions and the following disclaimer.
 *
 * Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation
 * and/or other materials provided with the distribution.
 *
 * Neither the name of EBANX nor the names of its
 * contributors may be used to endorse or promote products derived from
 * this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
 * OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Observer class that saves order data to the session,
 * so it can be retrieved during the checkout
 */
class Ebanx_ExpressPaymentSlip_Model_Observer
{
    /**
     * Saves the customer data
     * @param  Object $observer
     * @return Object
     */
    public function saveOrderQuoteToSession($observer)
    {
        $ebanx = Mage::app()->getRequest()->getParam('ebanx');

        if (isset($ebanx['cpf']))
            {
            $birthDate = str_pad($ebanx['birth_day'],   2, '0', STR_PAD_LEFT) . '/'
                       . str_pad($ebanx['birth_month'], 2, '0', STR_PAD_LEFT) . '/'
                       . $ebanx['birth_year'];

            // Save CPF and birthdate
            $customer = Mage::getSingleton('customer/session')->getCustomer();

            // Checks if the customer is already persisted before saving the custom fields
            if ($customer->getEmail())
            {
                $customer->setEbanxCpf($ebanx['cpf']);
                $customer->setEbanxBirthdate($birthDate);
                $customer->save();
            }
        }

        return $this;
    }
}