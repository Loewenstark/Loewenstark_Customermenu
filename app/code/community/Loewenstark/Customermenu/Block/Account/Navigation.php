<?php

class Loewenstark_Customermenu_Block_Account_Navigation
extends Mage_Customer_Block_Account_Navigation
{
    const XML_PATH_CUSTOMER_MENU_GENERAL = 'customermenu/general/';

    /**
    * Removes the menu item from the account navigation.
    *
    * @see http://www.matthias-zeis.com/archiv/wie-man-menu-mein-benutzerkonto-von-magento-anpasst
    *
    * @param string $name Name provided in the layout XML file (addLink)
    * @return Mage_Customer_Block_Account_Navigation
    */
    public function removeLinkByName($name)
    {
        if (isset($this->_links[$name]))
        {
            unset($this->_links[$name]);
        }
        else
        {
            Mage::log("Customer account navigation link '{$name}' does not exist.", Zend_Log::NOTICE, $this->_getConfigValue('file'));
        }
        return $this;
    }

    /**
     * Alias for removeLinkByPath
     *
     * @param string $url
     */
    public function removeLinkByUrl($url)
    {
        return $this->removeLinkByPath($url);
    }

    /**
     * Remove a link by its path. Calls removeLinkByName internally.
     *
     * @param string $path
     */
    public function removeLinkByPath($path)
    {
        foreach ($this->_links as $name => $link)
        {
            if ($path == $link['path'])
            {
                $this->removeLinkByName($name);
                return;
            }
        }
    }

    /**
    * @see Mage_Customer_Block_Account_Navigation::addLink
    */
    public function addLink($name, $path, $label, $urlParams=array())
    {
        if ($this->_getConfigValue('active'))
        {
            $log = sprintf('Label: "%s" Name: "%s"', $label, $name);
            Mage::log($log, Zend_Log::NOTICE, $this->_getConfigValue('file'));
        }
        return parent::addLink($name, $path, $label, $urlParams);
    }

    /**
    * Get Customermenu Config
    *
    * @param string $name
    * return mixed
    */
    private function _getConfigValue($name)
    {
        switch($name)
        {
            case 'active':
                return (bool) Mage::getStoreConfig(self::XML_PATH_CUSTOMER_MENU_GENERAL . $name);
            case 'file':
                return Mage::getStoreConfig(self::XML_PATH_CUSTOMER_MENU_GENERAL . $name);
            default:
                return false;
        }
    }
}
