<?php
namespace PCAPredict\Addressy\Model;
class SettingsData extends \Magento\Framework\Model\AbstractModel implements SettingsDataInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'pcapredict_addressy_settingsdata';

    protected function _construct()
    {
        $this->_init('PCAPredict\Addressy\Model\ResourceModel\SettingsData');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
