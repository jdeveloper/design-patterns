<?php
interface HttpClientInterface
{
    public function get($url): Response;
}

class HttpClient implements HttpClientInterface
{
    public function get($url): Response
    {
        // logic
        return new Response($content);
    }
}

class CachedHttpClient implement HttpClientInterface
{
    protected $httpClient;

    protected $cachedUrls = [];

    public function __constructor(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get($url): Response
    {
        if(!isset($this->cachedUrls[$url])){
            $this->cachedUrls[$url] = $this->httpClient->get($url);
        }

        return $this->cachedUrls[$url];
    }
}