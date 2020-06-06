<?php


namespace App\Http;

/**
 * Interface RequestInterface
 * @package app\Http
 */
interface RequestInterface
{
    /**
     * @return RequestInterface
     */
    public static function create(): RequestInterface;

    /**
     * @param string $query
     * @return string|null
     */
    public function getQuery(string $query): ?string;

    /**
     * @param string $query
     * @return string|null
     */
    public function getPost(string $query): ?string;

    /**
     * @param string $param
     * @return string|null
     */
    public function getUrlParam(string $param): ?string;
}