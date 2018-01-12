<?php
    namespace PCAPredict\Addressy\Controller\Adminhtml\Settings;
    class Index extends \Magento\Backend\App\Action{
        
        protected $resultPageFactory;
        protected $settingsDataFactory;

        /**
        * @var \Magento\Framework\HTTP\ZendClientFactory
        */
        protected $httpClientFactory;

        /**
        * @var \Magento\Framework\Message\ManagerInterface
        */
        protected $messageManager;

        public function __construct(
            \Magento\Backend\App\Action\Context         $context,
            \Magento\Framework\View\Result\PageFactory  $resultPageFactory,
            \PCAPredict\Addressy\Model\SettingsDataFactory     $settingsDataFactory,
            \Magento\Framework\HTTP\ZendClientFactory   $httpClientFactory
        )
        {
            $this->resultPageFactory = $resultPageFactory; 
            $this->settingsDataFactory = $settingsDataFactory;  
            $this->httpClientFactory = $httpClientFactory;
            return parent::__construct($context);
        }
          
        public function execute(){

            if ($this->getRequest()->isAjax()) 
            {
                $action = $this->getRequest()->getParam('action');
                switch($action) 
                {
                    case 'logout':
                        try
                        {
                            $settings = $this->settingsDataFactory->create();
                            $collection = $settings->getCollection();
                            $data = $collection->getData();
                            if ($data)
                            {
                                $settingsData = $settings->load(1);
                                $settingsData->setAccountCode('');
                                $settingsData->setEmailAddress('');
                                $settingsData->setAccountToken('');
                                
                                $settingsData->save();
                            }
                            $this->messageManager->addSuccess( __('You have successfully logged out from Addressy!') );
                        }
                        catch(\Exception $e)
                        {
                            $this->messageManager->addError( __('There was a problem logging out of Addressy!') );
                        }
                        break;

                    case 'save':
                        $email = $this->getRequest()->getParam('email_address');
                        $accCode = $this->getRequest()->getParam('account_code');
                        $accTok = $this->getRequest()->getParam('account_token');
                        $customjavascriptfront = $this->getRequest()->getParam('custom_javascript_front');
                        $customjavascriptback = $this->getRequest()->getParam('custom_javascript_back');

                        $settings = $this->settingsDataFactory->create();

                        try 
                        {
                            $settingsData = $settings->load(1);
                            $settingsData->setEmailAddress($email);
                            $settingsData->setAccountCode($accCode);
                            $settingsData->setAccountToken($accTok);
                            $settingsData->setCustomJavascriptFront($customjavascriptfront);
                            $settingsData->setCustomJavascriptBack($customjavascriptback);

                            $settingsData->save();
                        }
                        catch(\Exception $ex) 
                        {
                            var_dump($ex.getMessage);
                        }
                        break;
                    default:
                        throw new \Exception("Invalid action: " . $action);
                }
            }

            $page = $this->resultPageFactory->create();
            $page->setActiveMenu('PCAPredict_Addressy::Settings');
            $page->getConfig()->getTitle()->prepend(__('Addressy Settings'));
            return $page; 
        }

        protected function _isAllowed()
        {
            return $this->_authorization->isAllowed('PCAPredict_Addressy::settings');
        }
    }
