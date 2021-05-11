<?php

namespace Perspective\Holiday\Block;

class Holiday extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Perspective\Holiday\Helper\Data
     */
    public $_helper;
    public $_model;

    public function __construct(
        \Perspective\Holiday\Helper\Data $helper,
        \Perspective\Holiday\Model\HolidayFactory $model,
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        $this->_helper = $helper;
        $this->_model = $model;
        parent::__construct($context, $data);
    }

    /**
     * Get Holidays.
     * @return array|string
     */
    public function getHoliday()
    {
        $enable = $this->_helper->getGeneralConfig('enable');
        if ($enable) {
            $id = $this->_helper->getGeneralConfig('holidays');
            if ($id) {
                $id = str_replace(",", "", $id);
                $id = str_split($id);
                foreach ($id as $value) {
                    $holidays[$value] = $this->_helper->getById($value);
                }
                return $holidays;
            }
        }
        return "";
    }
}
