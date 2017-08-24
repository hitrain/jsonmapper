<?php
/**
 * Created by PhpStorm.
 * User: hitrain
 * Date: 24.08.17
 * Time: 10:08
 */

class MappingRuleNestedObject implements \JsonMapperInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * define mapping rule with assoc array
     * @return array
     */
    public function mappingRule()
    {
        return ['name' => 'name'];
    }
}