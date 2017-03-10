<?php

/*
 * This file is part of the overtrue/easy-sms.
 * (c) overtrue <i@overtrue.me>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\EasySms\Gateways;

use Overtrue\EasySms\Contracts\GatewayInterface;
use Overtrue\EasySms\Support\Config;

/**
 * Class Gateway
 */
abstract class Gateway implements GatewayInterface
{
    const DEFAULT_TIMEOUT = 5.0;

    /**
     * @var \Overtrue\EasySms\Support\Config
     */
    protected $config;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var float
     */
    protected $timeout;

    /**
     * Gateway constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    /**
     * Return base uri.
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * Return timeout.
     *
     * @return int|mixed
     */
    public function getTimeout()
    {
        return $this->timeout ?: $this->config->get('timeout', self::DEFAULT_TIMEOUT);
    }

    /**
     * Set timeout.
     *
     * @param int $timeout
     *
     * @return $this
     */
    public function timeout($timeout)
    {
        $this->timeout = floatval($timeout);

        return $this;
    }

    /**
     * @return \Overtrue\EasySms\Support\Config
     */
    public function getConfig()
    {
        return $this->config;
    }
}
