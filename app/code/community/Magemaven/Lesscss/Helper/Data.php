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
require_once(Mage::getBaseDir('lib') . DS . 'lessphp' . DS .'lessc.inc.php');

class Magemaven_Lesscss_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ENABLE_COMPRESS = 'lesscss/general/compress';

    /**
     * Get file extension in lower case
     *
     * @param $file
     * @return string
     */
    public function getFileExtension($file)
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }

    /**
     * Compile less file and return full path to created css
     *
     * @param $file
     * @return string
     */
    public function compile($file)
    {
        if (!$file) {
            return '';
        }

        try {
            $targetFilename = Mage::getBaseDir('media')
                . DS . 'lesscss' . DS . md5($file) . '.css';
            $cacheKey = 'less_' . $file;

            /** @var $cacheModel Mage_Core_Model_Cache */
            $cacheModel = $cache = Mage::getSingleton('core/cache');
            $cache = $cacheModel->load($cacheKey);
            if ($cache) {
                $cache = @unserialize($cache);
            }

            if (!file_exists($targetFilename)) {
                $cache = false;
            }

            $lastUpdated = (isset($cache['updated'])) ? $cache['updated'] : 0;
            $less = new lessc;
            if ($this->enableCompress()) {
                $less->setFormatter("compressed");
            }
            $cache = lessc::cexecute(($cache) ? $cache : $file, false, $less);

            if ($cache['updated'] > $lastUpdated) {
                if (!file_exists(dirname($targetFilename))) {
                    mkdir(dirname($targetFilename), 0777, true);
                }

                file_put_contents($targetFilename, $cache['compiled']);
                $cacheModel->save(serialize($cache), $cacheKey);
            }

        } catch (Exception $e) {
            Mage::logException($e);
            $targetFilename = '';
        }

        return $targetFilename;
    }

    public function enableCompress()
    {
        return (bool) Mage::getStoreConfig(self::XML_PATH_ENABLE_COMPRESS);
    }
}
