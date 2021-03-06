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

/**
 * @method \Sherlock\components\queries\Wildcard field() field(\string $value)
 * @method \Sherlock\components\queries\Wildcard value() value(\string $value)
 * @method \Sherlock\components\queries\Wildcard boost() boost(\float $value) Default: 1.0

 */
class Wildcard extends \Sherlock\components\BaseComponent implements \Sherlock\components\QueryInterface
{
    public function __construct($hashMap = null)
    {
        $this->params['boost'] = 1.0;

        parent::__construct($hashMap);
    }


    public function toArray()
    {
        $ret = array(
            'wildcard' =>
                array(
                    $this->params["field"] =>
                        array(
                            'value' => $this->params["value"],
                            'boost' => $this->params["boost"],
                        ),
                ),
        );

        return $ret;
    }

}
