<?php
namespace PCAPredict\Addressy\Helper;

class SettingsData extends \Magento\Framework\App\Helper\AbstractHelper
{

	/**
	 * @var \Magento\Framework\Escaper
	 */
	protected $escaper;

    /**
     * @var \PCAPredict\Addressy\Model\SettingsDataFactory
     */
    protected $settingsDataFactory;

	/**
	 * @param \Magento\Framework\App\Helper\Context $context
	 * @param \Magento\Framework\Escaper $escaper
     * @param \PCAPredict\Addressy\Model\SettingsDataFactory $settingsDataFactory
	 */
	public function __construct(
		\Magento\Framework\App\Helper\Context       $context,
		\Magento\Framework\Escaper                  $escaper,
        \PCAPredict\Addressy\Model\SettingsDataFactory     $settingsDataFactory
	) {
		$this->escaper = $escaper;
        $this->settingsDataFactory = $settingsDataFactory;
		parent::__construct($context);
	}

    public function getEmailAddress() 
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->escaper->escapeHtml(
            $this->settingsData->getEmailAddress()
        );
    }
    
    public function getAccountCode() 
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->escaper->escapeHtml(
            $this->settingsData->getAccountCode()
        );
    }

    public function getAccountToken()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getAccountToken();
    }

    public function getCustomJavaScriptFront()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getCustomJavascriptFront();
    }

    public function getCustomJavaScriptBack()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getCustomJavascriptBack();
    }
}
