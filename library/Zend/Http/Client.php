<?php

//call Laminas Http Client
class Zend_Http_Client extends Laminas\Http\Client
{
    public const GET     = 'GET';
    public const POST    = 'POST';
    public const PUT     = 'PUT';
    public const HEAD    = 'HEAD';
    public const DELETE  = 'DELETE';
    public const TRACE   = 'TRACE';
    public const OPTIONS = 'OPTIONS';
    public const CONNECT = 'CONNECT';
    public const MERGE   = 'MERGE';
    public const PATCH   = 'PATCH';

    /**
     * Same as setOptions method
     *
     * @param array $options
     * @return $this
     */
    public function setConfig($options = [])
    {
        parent::setOptions($options);
        return $this;
    }

    /**
     * Set the encoding type and data
     *
     * @param string|resource $data
     * @param string $enctype
     * @return $this
     */
    public function setRawData($data, $enctype = null)
    {
        $this->setEncType($enctype);
        $this->setRawBody($data);
        return $this;
    }

    /**
     * Same as send method
     *
     * @param string $method
     * @return mixed
     * @throws Zend_Http_Client_Exception
     */
    public function request($method)
    {
        $this->setMethod($method);
        $response = $this->send();
        $response->setStatus($response->getStatusCode());
        return $response;
    }
}
