<?php

namespace AlgoliaAssessment\CategoryPopularity\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Category::ENTITY, 'popularity_category', [
            'type' => 'varchar',
            'label' => 'Category Popularity',
            'input' => 'text',
            'sort_order' => 333,
            'source' => '',
            'global' => 1,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => null,
            'group' => 'General Information',
            'backend' => ''
        ]);
    }
}
