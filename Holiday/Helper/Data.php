<?php

namespace Perspective\Holiday\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_HOLIDAY = 'holidaySection/';

    /**
     * @var \Perspective\Holiday\Model\HolidayFactory
     */
    protected $_model;

    public function __construct(
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Perspective\Holiday\Model\HolidayFactory $model,
        Context $context
    ) {
        $this->_model = $model;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function getConfigValue($field, $storeId = null)
    {
        $value = $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        return $value;
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_HOLIDAY . 'general/' . $code, $storeId);
    }

    public function getById($id){
        return $this->_model->create()->load($id);
    }
}