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
     * @param string $appname
     * @param string $license
     *
     * @link https://newrelic.com/docs/php/the-php-api#api-start-txn
     */
    public function startTransaction($appname, $license = '')
    {
        newrelic_start_transaction($appname, $license);
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
    public function ignoreTransacion()
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

    /*
newrelic_custom_metric (metric_name, value)show details
newrelic_add_custom_parameter (key, value)show details
newrelic_add_custom_tracer (function_name)
newrelic_add_custom_tracer (classname::function_name)show details
newrelic_get_browser_timing_header ( [flag] )show details
newrelic_get_browser_timing_footer ([ flag] )show details
newrelic_disable_autorum (  )show details
newrelic_set_user_attributes (user, account, product)show details

    */
}
