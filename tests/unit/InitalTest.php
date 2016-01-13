<?php

/**
 * Created by PhpStorm.
 * User: francisco.delgado
 * Date: 13/1/16
 * Time: 16:23
 */
class InitalTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testInit()
    {
        $arr = array();
        $this->assertEquals(0, count($arr));
    }
}