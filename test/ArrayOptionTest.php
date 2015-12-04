<?php
class ArrayOptionTest extends PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $arr = new ArrayOption(['hoge' => 'fuga']);
        $this->assertEquals('fuga', $arr->hoge->get());

        $arr = new ArrayOption(['hoge' => ['fuga' => 'piyo']]);
        $this->assertEquals('piyo', $arr->hoge->fuga->get());
    }

    public function testGetNoSuchElement()
    {
        $this->setExpectedException('ArrayOptionNoSuchElementException');

        $arr = new ArrayOption(['hoge' => 'fuga']);
        $arr->foo->get();
    }

    public function testGetOrElse()
    {
        $arr = new ArrayOption(['hoge' => 'fuga']);
        $this->assertEquals('fuga', $arr->hoge->getOrElse('nothing'));
        $this->assertEquals('nothing', $arr->foo->getOrElse('nothing'));
    }
}
