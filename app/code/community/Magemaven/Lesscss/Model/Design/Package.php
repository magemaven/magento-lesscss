<?php
/**
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @category    Magemaven
 * @package     Magemaven_Lesscss
 * @copyright   Copyright (c) 2012 Sergey Storchay <r8@r8.com.ua>
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
class Magemaven_Lesscss_Model_Design_Package extends Mage_Core_Model_Design_Package
{
    public function getSkinUrl($file = null, array $params = array())
    {
        if (empty($params['_type'])) {
            $params['_type'] = 'skin';
        }

        /** @var $helper Magemaven_Lesscss_Helper_Data */
        $helper = Mage::helper('lesscss');

        if ($helper->getFileExtension($file) == 'less') {
            $file = $this->getFilename($file, $params);

            if ($file) {
                $file = str_replace(Mage::getBaseDir('media') . DS, '', $file);
                $file = str_replace('\\', '/', $file);
                $file = Mage::getBaseUrl('media',
                        isset($params['_secure']) ? (bool)$params['_secure'] : null
                    ) . $file;
            }
        } else {
            $file = parent::getSkinUrl($file, $params);
        }

        return $file;
    }

    public function getFilename($file, array $params)
    {
        /** @var $helper Magemaven_Lesscss_Helper_Data */
        $helper = Mage::helper('lesscss');

        $file = parent::getFilename($file, $params);
        if ($helper->getFileExtension($file) == 'less') {
            $file = $helper->compile($file);
        }

        return $file;
    }
}