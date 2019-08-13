<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Cohesionet
 * @package     Cohesionet_ShopConnect
 * @copyright   Copyright (c) 2015 Cohesionet (http://www.cohesionet.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Helper class for common operations.
 *
 * @category    Cohesionet
 * @package     Cohesionet_ShopConnect
 * @author      Cohesionet Solutions Ltd
 */
class Cohesionet_ShopConnect_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Path to store config cohesionet module enabled state.
     */
    const XML_PATH_ENABLED = 'cohesionet_shopConnect/settings/enabled';

    /**
     * Path to store config cohesionet service account name.
     */
    const XML_PATH_ACCOUNT = 'cohesionet_shopConnect/settings/account';

 
    /**
     * Check if module exists and enabled in global config.
     * Also checks if the module is enabled for the current store and if the needed criteria has been provided for the
     * module to work.
     *
     * @param string $moduleName the full module name, example Mage_Core
     *
     * @return boolean
     */
    public function isModuleEnabled($moduleName = null)
    {
        if (!parent::isModuleEnabled($moduleName)
            || !$this->getEnabled()
            || !$this->getAccount()
        ) {
            return false;
        }

        return true;
    }
    /**
     * Formats date into Cohesionet format, i.e. Y-m-d.
     *
     * @param string $date
     *
     * @return string
     */
    public function getFormattedDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    /**
     * Return if the module is enabled.
     *
     * @param mixed $store
     *
     * @return boolean
     */
    public function getEnabled($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_ENABLED, $store);
    }

    /**
     *
     * @param mixed $store
     *
     * @return string
     */
    public function getAccount($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_ACCOUNT, $store);
    }

}
