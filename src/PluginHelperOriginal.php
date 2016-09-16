<?php
namespace App;

class PluginHelperOriginal
{
    public function encodePluginSettings()
    {

        $attributeValue = '';

        $pluginList = func_get_args();

        if (isset($pluginList[0])) {
            if ($pluginList[0] === false) {
                array_shift($pluginList);
                $attributeValue = json_encode($pluginList);
            } elseif ($pluginList[0] === true) {
                array_shift($pluginList);
                $attributeValue = htmlentities(json_encode($pluginList));
            } else {
                $attributeValue = htmlentities(json_encode($pluginList));
            }
        }

        return $attributeValue;
    }
}
