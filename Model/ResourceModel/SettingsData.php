<?php
namespace PCAPredict\Addressy\Model\ResourceModel;
class SettingsData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('pcapredict_addressy_settingsdata','pcapredict_addressy_settingsdata_id');
    }
}
