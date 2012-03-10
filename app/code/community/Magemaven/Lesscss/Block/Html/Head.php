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
class Magemaven_Lesscss_Block_Html_Head extends Mage_Page_Block_Html_Head
{
    public function getCssJsHtml()
    {
        foreach($this->_data['items'] as $key => $item) {
            if (!in_array($item['type'], array('js_css', 'skin_css'))) {
                continue;
            }

            $extension = pathinfo($item['name'], PATHINFO_EXTENSION);
            if (strtolower($extension) != 'less') {
                continue;
            }
        }

        return parent::getCssJsHtml();
    }
}