<?php

namespace App\Http;

/**
 * Class Request
 * @package app\Http
 */
class Request implements RequestInterface
{
    private $post;

    private $get;

    /**
     * Request constructor.
     * @param array $get
     * @param array $post
     */
    private function __construct(array $get, array $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    /**
     * @return RequestInterface
     */
    public static function create(): RequestInterface
    {
        return new Request($_GET, $_POST);
    }

    /**
     * @param string $query
     * @return string|null
     */
    public function getQuery(string $query): ?string
    {
       return $this->getUrlParam($query) ?? $this->getPost($query);
    }

    /**
     * @param string $query
     * @param string|null $default
     * @return string|null
     */
    public function getPost(string $query, ?string $default = null): ?string
    {
       return $this->post[$query] ?? $default;
    }

    /**
     * @param string $param
     * @param string|null $default
     * @return string|null
     */
    public function getUrlParam(string $param, string $default = null): ?string
    {
        return $this->get[$param] ?? $default;
    }
}