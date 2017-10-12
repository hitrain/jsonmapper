<?php

require_once 'JsonMapperTest/MappingRuleObject.php';

/**
 * Created by PhpStorm.
 * User: hitrain
 * Date: 24.08.17
 * Time: 10:00
 */


class MappingRuleTest extends PHPUnit_Framework_TestCase
{



    public function testRules()
    {
        $jm = new JsonMapper();
        $params = ["isToken" => true];
        $sn = $jm->map(json_decode('{"title":"is Title", "nested": {"name": "is nested Name"}}'), new MappingRuleObject($params));
        $this->assertEquals('is Title', $sn->name);
        $this->assertEquals('is nested Name', $sn->nested->name);
        $this->assertEquals('is nested Name', $sn->extractedNested);
    }

    public function testRulesArray()
    {
        $jm = new JsonMapper();
        $params = ["isToken" => true];
        $sn = $jm->mapArray(json_decode('[{"title":"is Title", "nested": {"name": "is nested Name"}}, {"title":"is Title", "nested": {"name": "is nested Name"}}]'), array(), 'MappingRuleObject', $params);

        $this->assertEquals('is Title', $sn[0]->name);
        $this->assertEquals('is nested Name', $sn[0]->nested->name);
        $this->assertEquals('is nested Name', $sn[0]->extractedNested);

        $this->assertEquals('is Title', $sn[1]->name);
        $this->assertEquals(true, $sn[1]->isToken);

        $this->assertEquals('is nested Name', $sn[1]->nested->name);
        $this->assertObjectNotHasAttribute('isToken', $sn[1]->nested);

        $this->assertEquals('is nested Name', $sn[1]->extractedNested);
    }
}