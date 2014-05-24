<?php
/**
 * 
 * 
 * 
 * 
 */ 


class Cotya_PerformanceFixes_Model_Observer
{

    /**
     *
     * removes the category/product ID specific handles to improve cache reusage across categories
     *
     * @param $observer
     */
    public function optimizeLayoutCaching($observer)
    {
        $update = $observer->getLayout()->getUpdate();
        foreach($update->getHandles() as $handle){
            if(
                strpos($handle, 'CATEGORY_') === 0
                || (strpos($handle, 'PRODUCT_') === 0 && strpos($handle, 'PRODUCT_TYPE_') === false)
            ){
                $update->removeHandle($handle);
            }
        }
    }



}
