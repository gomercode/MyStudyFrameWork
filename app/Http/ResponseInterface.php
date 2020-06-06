<?php

namespace App\Http;

interface ResponseInterface
{
    /**
     * @return ResponseInterface
     */
    public static function create(): ResponseInterface;

    /**
     * @param string $location
     * @return ResponseInterface
     */
    public static function createRedirectResponse(string $location): ResponseInterface;

    /**
     * @return ResponseInterface
     */
    public static function createErrorResponse(): ResponseInterface;

    public function send(): void;

    /**
     * @param string $body
     */
    public function setBody(string $body): void ;
}