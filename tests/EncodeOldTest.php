<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\PluginHelperOriginal as PluginHelper;

class EncodeOldTest extends TestCase
{
    protected $pluginHelper;

    protected function setUp()
    {
        $this->pluginHelper = new PluginHelper;
    }

    protected function getFixtureContent($fixtureName)
    {
        return file_get_contents(__DIR__ . '/fixtures/' . $fixtureName . '.txt');
    }

    public function testCanEncodeASinglePlugin()
    {
        $this->assertEquals(
            $this->getFixtureContent('fixture1'),
            $this->pluginHelper->encodePluginSettings('ScrollSpy')
        );

        $this->assertEquals(
            '["ScrollSpy"]',
            $this->pluginHelper->encodePluginSettings(false, 'ScrollSpy')
        );

        $this->assertEquals(
            $this->getFixtureContent('fixture2'),
            $this->pluginHelper->encodePluginSettings(
                ['ScrollSpy', ['delay' => 500, 'color' => '#ff00ff']]
            )
        );

        $this->assertEquals(
            $this->getFixtureContent('fixture3'),
            $this->pluginHelper->encodePluginSettings(
                false,
                ['ScrollSpy', ['delay' => 500, 'color' => '#ff00ff']]
            )
        );
    }


    public function testCanEncodeMultiplePlugins()
    {
        $this->assertEquals(
            $this->getFixtureContent('fixture4'),
            $this->pluginHelper->encodePluginSettings('ScrollSpy', 'TabbedNavigation')
        );

        $this->assertEquals(
            $this->getFixtureContent('fixture5'),
            $this->pluginHelper->encodePluginSettings(
                ['ScrollSpy', ['delay' => 500, 'color' => '#ff00ff']],
                ['TabbedNavigation', ['responsive' => true, 'color' => '#ff0000']]
            )
        );

        $this->assertEquals(
            '["ScrollSpy","TabbedNavigation"]',
            $this->pluginHelper->encodePluginSettings(false, 'ScrollSpy', 'TabbedNavigation')
        );


           $this->assertEquals(
               $this->getFixtureContent('fixture6'),
               $this->pluginHelper->encodePluginSettings(
                   false,
                   ['ScrollSpy', ['delay' => 500, 'color' => '#ff00ff']],
                   ['TabbedNavigation',['responsive' => true,'color' => '#ff0000']]
               )
           );
    }
}
