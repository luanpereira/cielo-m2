<?php
/**
 * Jefferson Porto
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  Az2009
 * @package   Az2009_Cielo
 *
 * @copyright Copyright (c) 2018 Jefferson Porto - (https://www.linkedin.com/in/jeffersonbatistaporto/)
 *
 * @author    Jefferson Porto <jefferson.b.porto@gmail.com>
 */
namespace Az2009\Cielo\Controller\Installments;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        \Az2009\Cielo\Helper\Installment $installment
    ) {
        $this->installment = $installment;
        parent::__construct($context);
    }

    public function execute()
    {
        $installments = $this->installment->getInstallmentsAvailable();
        $li = '';
        foreach ($installments as $value => $label) {
            $li .= "<option class='item' value='{$value}'>{$label}</option>";
        }

        return $this->getResponse()->setBody($li);
    }
}