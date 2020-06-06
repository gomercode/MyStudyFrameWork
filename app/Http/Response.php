<?php


namespace App\Http;


use App\Http\ResponseInterface;

class Response implements ResponseInterface
{
    const HEADER_LOCATION = 'Location';
    const STATUS_OK_CODE = 200;
    const STATUS_NOT_FOUND = 404;
    const STATUS_REDIRECT = 300;


    private $headers = [];

    private $statusCode;

    /**
     * @var string|null
     */
    private $body;

    private function __construct()
    {
    }

    public static function create(): ResponseInterface
    {
       return (new Response())
           ->setStatusCode(self::STATUS_OK_CODE);
    }

    public static function createRedirectResponse(string $location): ResponseInterface
    {
        $response = new Response();
        $response->addHeader(self::HEADER_LOCATION, $location);
        $response->setStatusCode(self::STATUS_REDIRECT);

        return $response;
    }

    public static function createErrorResponse(): ResponseInterface
    {
        // TODO: Implement createErrorResponse() method.
    }

    /**
     * @param string|null $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    public function send(): void
    {
        foreach ($this->headers as $headerName => $value) {
            header(sprintf('%s: %s', $headerName, $value));
        }
        http_response_code($this->statusCode);

        print $this->body;
    }

    private function addHeader(string $headerName, string $headerValue)
    {
        $this->headers[$headerName] = $headerValue;
    }

    private function setStatusCode(int $status): Response
    {
        $this->statusCode = $status;

        return $this;
    }

}