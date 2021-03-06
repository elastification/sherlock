<?php
/**
 * User: Zachary Tong
 * Date: 2013-02-19
 * Time: 08:26 PM
 * Auto-generated by "generate.filters.php"
 *
 * @package Sherlock\components\filters
 */
namespace Sherlock\components\filters;

use Sherlock\components;

/**
 * @method \Sherlock\components\filters\Not _cache() _cache(\bool $value) Default: false
 */
class Not extends \Sherlock\components\BaseComponent implements \Sherlock\components\FilterInterface
{
    public function __construct($hashMap = null)
    {
        $this->params['_cache'] = false;

        parent::__construct($hashMap);
    }


    /**
     * @param  \Sherlock\components\QueryInterface | \Sherlock\components\FilterInterface $value
     *
     * @return Not
     */
    public function not($value)
    {
        if ($value instanceof \Sherlock\components\QueryInterface) {
            $this->params['not'] = $value->toArray();
        } elseif ($value instanceof \Sherlock\components\FilterInterface) {
            $this->params['not'] = array("filter" => $value->toArray());
        }

        return $this;
    }


    public function toArray()
    {
        $ret = array(
            'not' => $this->params["not"],
            '_cache' => $this->params["_cache"],
        );

        return $ret;
    }

}
