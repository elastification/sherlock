<?php
/**
 * User: Zachary Tong
 * Date: 2/4/13
 * Time: 10:28 AM
 * @package Sherlock
 * @author  Zachary Tong
 * @version 0.1.2
 */

namespace Sherlock;

use Sherlock\common\Cluster;
use Sherlock\common\events\Events;
use Sherlock\requests;
use Sherlock\common\exceptions;
use Sherlock\wrappers;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Elasticsearch\Client as ESClient;
/**
 * Class Sherlock
 * @package Sherlock
 */
class Sherlock
{
    /**
     * @var array Sherlock settings, can be replaced with user-settings through constructor
     */
    protected $settings;

    /**
     * @var object Elasticsearch Client
     */
    protected $esClient;

    /**
     * @var array Templates - not used at the moment
     */
    protected $templates = array();


    /**
     * Sherlock constructor, accepts optional user settings
     *
     * @param array $userSettings Optional user settings to over-ride the default
     */
    public function __construct($userSettings = array())
    {
        $this->initializeSherlock($userSettings);
    }


    /**
     * Query builder, used to return a QueryWrapper through which a Query component can be selected
     * @return wrappers\QueryWrapper
     */
    public static function queryBuilder()
    {
        return new \Sherlock\wrappers\QueryWrapper();
    }


    /**
     * Filter builder, used to return a FilterWrapper through which a Filter component can be selected
     * @return wrappers\FilterWrapper
     */
    public static function filterBuilder()
    {
        return new wrappers\FilterWrapper();
    }


    /**
     * Facet builder, used to return a FilterWrapper through which a Filter component can be selected
     * @return wrappers\FacetWrapper
     */
    public static function facetBuilder()
    {
        return new wrappers\FacetWrapper();
    }


    /**
     * Facet builder, used to return a FilterWrapper through which a Filter component can be selected
     * @return wrappers\AggregationWrapper
     */
    public static function aggregationBuilder()
    {
        return new wrappers\AggregationWrapper();
    }


    /**
     * Highlight builder, used to return a HighlightWrapper through which a Highlight component can be selected
     * @return wrappers\HighlightWrapper
     */
    public static function highlightBuilder()
    {
        return new wrappers\HighlightWrapper();
    }


    /**
     * Index builder, used to return a IndexWrapper through which an Index component can be selected
     * @return wrappers\IndexSettingsWrapper
     */
    public static function indexSettingsBuilder()
    {
        return new wrappers\IndexSettingsWrapper();
    }


    /**
     * Mapping builder, used to return a MappingWrapper through which a Mapping component can be selected
     *
     * @param  null|string                     $type
     *
     * @return wrappers\MappingPropertyWrapper
     */
    public static function mappingBuilder($type = null)
    {
        return new wrappers\MappingPropertyWrapper($type);
    }


    /**
     * @return wrappers\SortWrapper
     */
    public static function sortBuilder()
    {
        return new wrappers\SortWrapper();
    }


    /**
     * @return array
     */
    public function getSherlockSettings()
    {
        return $this->settings;
    }


    /**
     * @param $userSettings
     */
    private function initializeSherlock($userSettings)
    {
        $this->mergeUserSettingsWithDefault($userSettings);
    }

    /**
     * @param array $userSettings
     */
    private function mergeUserSettingsWithDefault($userSettings)
    {
        $this->settings = array_merge($this->getDefaultSettings(), $userSettings);
    }

    /**
     * @return array Default settings
     */
    private function getDefaultSettings()
    {
        return array(
            // Application
            'base'               => __DIR__ . '/',
            'mode'               => 'development',
        );
    }

}
