<?php
/**
 * Created by PhpStorm.
 * User: hitrain
 * Date: 24.08.17
 * Time: 10:02
 */

require_once 'MappingRuleNestedObject.php';


class MappingRuleObject implements \JsonMapperInterface
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var MappingRuleNestedObject
     */
    public $nested;

    /**
     * @var string
     */
    public $extractedNested;

    /**
     * define mapping rule with assoc array
     * @return array
     */
    public function mappingRule()
    {
        return [
            'title' => 'name',
            'nested' => 'nested',
            'nested.name' => 'extractedNested'
            ];
    }
}