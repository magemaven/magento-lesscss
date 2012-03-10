Magemaven Lesscss
=================

On-the-fly LESS compiler for Magento.

This extension allows to use [LESS](http://lesscss.org) style sheets with your themes and extensions. It's fully compatible with Magento's CSS merging functionality. LESS files are compiled on-the-fly and will be automatically recompiled after modifing or cache flushing. 

Extension uses [lessphp](http://leafo.net/lessphp/) library by Leaf Corcoran, which is bundled with module.

* Download from Magento Connect: [http://www.magentocommerce.com/magento-connect/catalog/product/view/id/12261/](http://www.magentocommerce.com/magento-connect/catalog/product/view/id/12261/)
* Support Forum: [http://magemaven.com/forum/#/categories/magemaven-lesscss](http://magemaven.com/forum/#/categories/magemaven-lesscss)
* Bugtracker: [http://github.com/r8/magento-lesscss/issues](http://github.com/r8/magento-lesscss/issues)

Installation
------------

Module should work out of the box after install.

Usage
-----

Extension will automatically compile all files with 'less' extension and replace them with derived CSS. You will just need to place your LESS files to skin folder and include in layout updates just like you do it with CSS:

`<action method="addCss"><stylesheet>css/styles.less</stylesheet></action>`

`<action method="addItem"><type>skin_css</type><name>css/styles-ie.less</name><params/><if>lt IE 8</if></action>`
