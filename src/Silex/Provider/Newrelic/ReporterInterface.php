<?php
/*
 * This file is part of some package.
 *
 * (c) Hakin Dazs <hakindazs@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Dazz\Silex\Provider\Newrelic;

/**
 * Class NewrelicServiceInterface
 */
interface ReporterInterface
{
    /**
     * @param string     $message
     * @param \Exception $exception
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-notice-error
     */
    public function addNoticeError($message, \Exception $exception = null);

    /**
     * @param string $name
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-name-wt
     */
    public function setTransactionName($name);

    /**
     * @param string $appName
     * @param string $license
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-start-txn
     */
    public function startTransaction($appName, $license = '');

    /**
     * @link https://newrelic.com/docs/php/the-php-api#api-end-txn
     */
    public function endTransaction();

    /**
     * @link https://newrelic.com/docs/php/the-php-api#api-ignore-transaction
     */
    public function ignoreTransaction();

    /**
     * Do not generate Apdex metrics for this transaction.
     *
     * Useful when you have either very short or very long transactions
     *   (such as file downloads) that can skew your apdex score
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-ignore-apdex
     */
    public function ignoreApdex();

    /**
     * @param bool $flag
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-bg
     */
    public function isBackgroundJob($flag = false);

    /**
     * @param bool $flag
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-capture-params
     */
    public function captureParams($flag = true);

    /**
     * @param string $metricName
     * @param int    $value  Values saved are assumed to be milliseconds, so "4" will be stored as ".004"
     * @param string $prefix Avoid creating too many unique custom metric names.
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-custom-metric
     */
    public function addCustomMetric($metricName, $value, $prefix);

    /**
     * This parameter is shown in any transaction trace that results from this transaction.
     *
     * @param string $key
     * @param        $value
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-custom-param
     */
    public function addCustomParameter($key, $value);

    /**
     * @param string $functionOrClassName
     *
     * @example: $functionOrClassName = function_name or classname::function_name
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-custom-tracer
     */
    public function addCustomTracer($functionOrClassName);

    /**
     * @param bool $flag If flag is specified it must be a boolean, and if omitted, defaults to true
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-rum-header
     */
    public function getBrowserTimingHeader($flag = true);

    /**
     * @param bool $flag If flag is specified it must be a boolean, and if omitted, defaults to true.
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-rum-footer
     */
    public function getBrowserTimingFooter($flag = true);

    /**
     * Prevents the output filter from attempting to insert
     *  RUM JavaScript for this current transaction. Useful for AJAX calls, for example
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-rum-disable
     */
    public function disableAutoRum();

    /**
     * @param string $user
     * @param string $account
     * @param string $product
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-set-user-attributes
     * @link https://newrelic.com/docs/features/browser-traces
     */
    public function setUserAttributes($user, $account, $product);
}