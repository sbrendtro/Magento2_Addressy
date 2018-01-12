<?php
namespace PCAPredict\Addressy\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff
        
        //START table setup
        $table = $installer->getConnection()->newTable(
                    $installer->getTable('pcapredict_addressy_settingsdata')
            )->addColumn(
                    'pcapredict_addressy_settingsdata_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true ],
                    'Id'
                )->addColumn(
                    'email_address',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    [ 'nullable' => true ],
                    'Email Address'
                )->addColumn(
                    'account_code',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    10,
                    [ 'nullable' => true ],
                    'Account Code'
                )->addColumn(
                    'account_token',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    36,
                    [ 'nullable' => true ],
                    'Account Token'
                )->addColumn(
                    'custom_javascript_front',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    \Magento\Framework\DB\Ddl\Table::MAX_TEXT_SIZE,
                    [ 'nullable' => true ],
                    'Custom JavaScript Frontend'
                )->addColumn(
                    'custom_javascript_back',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    \Magento\Framework\DB\Ddl\Table::MAX_TEXT_SIZE,
                    [ 'nullable' => true ],
                    'Custom JavaScript Backend'
                )->addColumn(
                    'creation_time',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT ],
                    'Creation Time'
                )->addColumn(
                    'update_time',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE ],
                    'Modification Time'
                );

        $installer->getConnection()->createTable($table);
        //END   table setup
        $installer->endSetup();
    }
}
