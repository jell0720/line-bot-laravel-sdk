<?php
/**
 * Created by PhpStorm.
 * User: Lalith Mohan Tadigadapa
 * Date: 3/10/16
 * Time: 12:39 PM
 */

namespace Jordanator\LineBot;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class Line
{
    private $token;
    private $secret;

    public function __construct($token, $args)
    {
        $this->token = $token;
        $this->secret = $args['channelSecret'];

        $this->httpClient = new CurlHTTPClient($this->token);
        $this->bot = new LINEBot($this->httpClient, $args);
    }


}