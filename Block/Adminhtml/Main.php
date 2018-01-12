<?php
namespace PCAPredict\Addressy\Block\Adminhtml;

class Main extends \Magento\Framework\View\Element\Template
{
    protected $settingsDataFactory;
    protected $settingsData;
    protected $resultJsonFactory;
    protected $urlInterface;
    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context    $context,
        \PCAPredict\Addressy\Model\SettingsDataFactory      $settingsDataFactory,
        \Magento\Framework\Controller\Result\JsonFactory    $resultJsonFactory
    )
    {
        $this->settingsDataFactory = $settingsDataFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->urlInterface = $context->getUrlBuilder();
        parent::__construct($context);
    }

    function _prepareLayout()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
    }

    function execute()
    {

    }

    function getAjaxUrl()
    {
        return $this->urlInterface->getUrl();
    }

    function getAccountCode() 
    {   
        if ($this->settingsData)
            return $this->settingsData->getAccountCode();
        else
            return null;
    }

    function getEmailAddress() 
    {   
        if ($this->settingsData)
            return $this->settingsData->getEmailAddress();
        else
            return null;
    }

    function isLoggedIn()
    {
        return getAccountCode() != null;
    }

}