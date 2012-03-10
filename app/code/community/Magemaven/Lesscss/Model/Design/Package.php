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
        return parent::getSkinUrl($file, $params);
    }

    public function getFilename($file, array $params)
    {
        return parent::getFilename($file, $params);
    }
}