<?php

namespace Jordanator\LineBot;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class LineBotManager
{
    private $token;
    private $secret;
    private $httpClient;
    private $bot;

    public function __construct($token, $args)
    {
        $this->token = $token;
        $this->secret = $args['channelSecret'];

        $this->httpClient = new CurlHTTPClient($this->token);
        $this->bot = new LINEBot($this->httpClient, $args);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    public function __call($name, $arguments)
    {
        $this->bot->$name($arguments);
    }

}
