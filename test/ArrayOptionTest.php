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

    public function testIsEmpty()
    {
        $arr = new ArrayOption(['hoge' => 'fuga']);
        $this->assertTrue($arr->foo->isEmpty());
        $this->assertFalse($arr->hoge->isEmpty());
    }

    public function testIsDefined()
    {
        $arr = new ArrayOption(['hoge' => 'fuga']);
        $this->assertFalse($arr->foo->isDefined());
        $this->assertTrue($arr->hoge->isDefined());
    }

    public function testOrNull()
    {
        $arr = new ArrayOption(['hoge' => 'fuga']);
        $this->assertNull($arr->foo->orNull());
        $this->assertEquals('fuga', $arr->hoge->orNull());
    }
}
