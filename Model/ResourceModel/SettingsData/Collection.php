<?php
namespace PCAPredict\Addressy\Model\ResourceModel\SettingsData;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('PCAPredict\Addressy\Model\SettingsData','PCAPredict\Addressy\Model\ResourceModel\SettingsData');
    }
}
