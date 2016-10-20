<?php

namespace AnthonyBocci;

/**
 * @class FTP
 * An FTP class to do stuff with FTP
 */
class FTP
{
    /**
     * @var string
     * The server url
     */
    private $host;
    /**
     * @var string
     * FTP login
     */
    private $login;
    /**
     * @var string
     * FTP password
     */
    private $password;
    /**
     * @var resource
     * FTP stream, connection with host
     */
    private $connexionId;

    /**
     * @var int
     * Connection port
     */
    private $port;

    /**
     * @var int
     * Timeout during connections
     */
    private $timeout;

    /**
     * Constructor
     * @param string $host the host to connect
     * @param int $port the connection port
     * @param int $timeout the timeout during connections
     * @param bool $connect should it connect immediatly to host
     */
    public function __construct($host, $port = 21, $timeout = 90, $connect = true)
    {
        $this->host = $host;
        $this->port = $port;
        $this->timeout = $timeout;
        if ($connect) {
            $this->connect();
        }
    }

    /**
     * Connect to host
     * @return bool true if connection worked, false else
     */
    public function connect()
    {
        $this->connexionId = ftp_connect($this->host, $this->port, $this->timeout);
        return $this->connexionId !== false;
    }



}