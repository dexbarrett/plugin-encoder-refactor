<?php
namespace App;

class PluginHelper
{
    public function encodePluginSettings(array $pluginList, $escapeHTML = true)
    {

        $attributeValue = json_encode($pluginList);

        if ($escapeHTML) {
            $attributeValue = htmlentities($attributeValue);
        }

        return $attributeValue;
    }
}
