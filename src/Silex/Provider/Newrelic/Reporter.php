<?php
namespace Dazz\Silex\Provider\Newrelic;

class Reporter implements ReporterInterface
{
    public function __construct(array $config)
    {
        newrelic_set_appname(
            $config['appname'],
            $license,
            $xmit
        );
    }

    /**
     * @link https://newrelic.com/docs/php/the-php-api#api-notice-error
     */
    public function addNoticeError($message, \Exception $exception = null)
    {
        newrelic_notice_error($message, $exception);
    }

    /**
     * @param string $name
     */
    public function setTransactionName($name)
    {
        newrelic_name_transaction($name);
    }

    /**
     * @param string $appName
     * @param string $license
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-start-txn
     */
    public function startTransaction($appName, $license = '')
    {
        newrelic_start_transaction($appName, $license);
    }

    /**
     * @link https://newrelic.com/docs/php/the-php-api#api-end-txn
     */
    public function endTransaction()
    {
        newrelic_end_of_transaction();
    }

    /**
     * @link https://newrelic.com/docs/php/the-php-api#api-ignore-transaction
     */
    public function ignoreTransaction()
    {
        newrelic_ignore_transaction();
    }

    /**
     * Do not generate Apdex metrics for this transaction.
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-ignore-apdex
     */
    public function ignoreApdex()
    {
        newrelic_ignore_apdex();
    }

    public function isBackgroundJob($flag = false)
    {
        newrelic_background_job($flag);
    }

    /**
     * @param $flag
     * @link https://newrelic.com/docs/php/the-php-api#api-capture-params
     */
    public function captureParams($flag = true)
    {
        newrelic_capture_params ($flag);
    }

    /**
     * @param string $metricName
     * @param int    $value  Values saved are assumed to be milliseconds, so "4" will be stored as ".004"
     * @param string $prefix Avoid creating too many unique custom metric names.
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-custom-metric
     */
    public function addCustomMetric($metricName, $value, $prefix = 'Custom')
    {
        newrelic_custom_metric(sprint('%s/%s', $prefix, $metricName), $value);
    }

    /**
     * This parameter is shown in any transaction trace that results from this transaction.
     *
     * @param string $key
     * @param        $value
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-custom-param
     */
    public function addCustomParameter($key, $value)
    {
        newrelic_add_custom_parameter($key, $value);
    }

    /**
     *
     * @param string $functionOrClassName
     *
     * @example: $functionOrClassName = function_name or classname::function_name
     *
     * @link   https://newrelic.com/docs/php/the-php-api#api-custom-tracer
     */
    public function addCustomTracer($functionOrClassName)
    {
        newrelic_add_custom_tracer($functionOrClassName);
    }

    /**
     * @param bool $flag If flag is specified it must be a boolean, and if omitted, defaults to true
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-rum-header
     */
    public function getBrowserTimingHeader($flag = true)
    {
        newrelic_get_browser_timing_header($flag);
    }


    public function disableAutorun()
    {
        newrelic_disable_autorum();
    }

    public function setUserAttributes($user, $account, $product)
    {
        newrelic_set_user_attributes ($user, $account, $product);
    }
}
