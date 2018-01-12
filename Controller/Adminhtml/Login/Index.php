<?php
namespace PCAPredict\Addressy\Controller\Adminhtml\Login;
class Index extends \Magento\Backend\App\AbstractAction {

    protected $settingsDataFactory;

	/**
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
	 */
	public function __construct(
		\Magento\Backend\App\Action\Context                 $context,
		\Magento\Framework\Controller\Result\JsonFactory    $resultJsonFactory,
        \PCAPredict\Addressy\Model\SettingsDataFactory             $settingsDataFactory
	) {
		$this->resultJsonFactory = $resultJsonFactory;
        $this->settingsDataFactory = $settingsDataFactory; 
        return parent::__construct($context);
	}

	/**
	 * @return \Magento\Framework\Controller\Result\Json
	 */
	public function execute() {
		/** @var \Magento\Framework\Controller\Result\Json $result */
		$result = $this->resultJsonFactory->create();

        $email = $this->getRequest()->getParam('email_address');
        $accCode = $this->getRequest()->getParam('account_code');
        $accTok = $this->getRequest()->getParam('account_token');
        $settings = $this->settingsDataFactory->create();
        try 
        {
            $settingsData = $settings->load(1);
            $settingsData->setEmailAddress($email);
            $settingsData->setAccountCode($accCode);
            $settingsData->setAccountToken($accTok);
            $settingsData->save();
        }
        catch(\Exception $ex) 
        {
            return $result->setData(['success' => false]);
        }

		return $result->setData(['success' => true]);
	}
}