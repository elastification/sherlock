<?php
/**
 * User: Zachary Tong
 * Date: 2013-02-16
 * Time: 09:24 PM
 * Auto-generated by "generate.php"
 *
 * @package Sherlock\components\queries
 */
namespace Sherlock\components\queries;

use Sherlock\components;
use Sherlock\components\QueryInterface;

/**
 * Bool Query
 *
 * @method \Sherlock\components\queries\Bool minimum_number_should_match() minimum_number_should_match(\int $value)
 *         Default: 2
 * @method \Sherlock\components\queries\Bool boost() boost(\float $value) Default: 1.0
 * @method \Sherlock\components\queries\Bool disable_coord() disable_coord(\int $value) Default: 1
 */
class Bool extends \Sherlock\components\BaseComponent implements QueryInterface
{
    /**
     * @param null $hashMap Optional assoc array of values to prefill the Bool
     */
    public function __construct($hashMap = null)
    {
        $this->params['must'] = array();
        $this->params['must_not'] = array();
        $this->params['should'] = array();

        parent::__construct($hashMap);
    }


    /**
     * Must clause of Bool
     *
     * @param QueryInterface|array $value Single or array of QueryInterface objects
     *
     * @return $this
     */
    public function must($value)
    {
        $args = $this->normalizeFuncArgs(func_get_args());

        foreach ($args as $arg) {
            if ($arg instanceof QueryInterface) {
                $this->params['must'][] = $arg->toArray();
            }
        }

        return $this;
    }


    /**
     * Must_not clause of Bool
     *
     * @param QueryInterface|array $value Single or array of QueryInterface objects
     *
     * @return $this
     */
    public function must_not($value)
    {
        $args = $this->normalizeFuncArgs(func_get_args());

        foreach ($args as $arg) {
            if ($arg instanceof QueryInterface) {
                $this->params['must_not'][] = $arg->toArray();
            }
        }

        return $this;
    }


    /**
     * Should clause of Bool
     *
     * @param QueryInterface|array $value Single or array of QueryInterface objects
     *
     * @return $this
     */
    public function should($value)
    {
        $args = $this->normalizeFuncArgs(func_get_args());

        foreach ($args as $arg) {
            if ($arg instanceof QueryInterface) {
                $this->params['should'][] = $arg->toArray();
            }
        }

        return $this;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $params = $this->convertParams(
            array(
                'must',
                'must_not',
                'should',
                'minimum_number_should_match',
                'boost',
                'disable_coord',
            )
        );

        $ret = array('bool' => $params);

        return $ret;
    }

}
