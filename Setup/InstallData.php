<?php

namespace PCAPredict\Addressy\Setup;
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    protected $settingsDataFactory;

    protected $settingsHelper;
    
    public function __construct(\PCAPredict\Addressy\Model\SettingsDataFactory $settingsDataFactory, \PCAPredict\Addressy\Helper\SettingsData $settingsHelper)
    {
        $this->settingsDataFactory = $settingsDataFactory;
        $this->settingsHelper = $settingsHelper;
    }
    
    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $settings = $this->settingsDataFactory->create();

        $settings->setEmailAddress('');
        $settings->setAccountCode('');
        $settings->setAccountToken('');
        $settings->setCustomJavascriptFront('');
        $settings->setCustomJavascriptBack('');
        
        $settings->save();
    }
}
