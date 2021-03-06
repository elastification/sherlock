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
 * Class Term
 *
 * @package Sherlock\components\queries
 */
class Term extends components\BaseComponent implements QueryInterface
{

    /**
     * @param string $value
     *
     * @return $this
     */
    public function field($value)
    {
        $this->params['field'] = $value;
        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function term($value)
    {
        $this->params['value'] = $value;
        return $this;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function boost($value)
    {
        $this->params['boost'] = $value;
        return $this;
    }

    public function toArray()
    {
        $params = $this->convertParams(
            array(
                'value',
                'boost',
            )
        );

        $ret = array(
            'term' =>
                array($this->params["field"] => $params),
        );

        return $ret;
    }

}
