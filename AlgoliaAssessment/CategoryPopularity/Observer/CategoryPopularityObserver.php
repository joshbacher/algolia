<?php

namespace AlgoliaAssessment\CategoryPopularity\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\DataObject;

class CategoryPopularityObserver implements ObserverInterface
{
    public function __construct()
    {

    }

    public function execute(Observer $observer)
    {
        $categoryCustomData = $observer->getData('custom_data');
        $category = $observer->getData('category');

        $data = [
            'category_popularity' => $category->getData('popularity_category') ? $category->getData('popularity_category') : 0,
        ];
        $categoryCustomData->setData('custom_data', $data);
    }
}
 