<?php

namespace Crush\Http;

use Crush\Http\Contracts\Http as HttpInterface;
use GuzzleHttp\Client;

class Http implements HttpInterface {

    protected $client;
    protected $options;

    public function __construct(Client $client, $options = []) {
        $this->client = $client;
        $this->options = array_merge($this->getDefaultOptions(), $options);
    }

    public function setHeaders($headers = []) {
        $this->options['headers'] = $headers;
    }

    public function getHeaders() {
        return $this->options['headers'];
    }

    public function setOptions($options = []) {
        $this->options = array_merge($this->options, $options);
    }

    public function resetOptions() {
        $this->options = $this->getDefaultOptions();
    }

    public function getOptions() {
        return $this->options;
    }

    public function get(String $url, $options = []) {
        $options = array_merge($this->options, $options);

        $response = $this->client->get($url, $options);
        $content = $response->getBody()->getContents();

        return $content;
    }

    public function post(String $url, $data=[], $options = []) {
        $options['body'] = json_encode($data);
        $options = array_merge($this->options, $options);

        return $this->client->post($url, $options);
    }

    public function put(String $url, $data=[], $options = []) {
        $options['body'] = json_encode($data);
        $options = array_merge($this->options, $options);

        return $this->client->put($url, $options);
    }

    public function delete(String $url, $options = []) {
        $options = array_merge($this->options, $options);

        return $this->client->delete($url, $options);
    }

    public function getAsync(String $url, $options = []) {
        $options = array_merge($this->options, $options);

        return $this->client->getAsync($url, $options);
    }

    public function postAsync(String $url, $data=[], $options = []) {
        $options['body'] = json_encode($data);
        $options = array_merge($this->options, $options);

        return $this->client->postAsync($url, $options);
    }

    public function putAsync(String $url, $data=[], $options = []) {
        $options['body'] = json_encode($data);
        $options = array_merge($this->options, $options);

        return $this->client->putAsync($url, $options);
    }

    public function deleteAsync(String $url, $options = []) {
        $options = array_merge($this->options, $options);

        return $this->client->deleteAsync($url, $options);
    }

    private function getDefaultOptions() {
        return [
            'verify' => false
        ];
    }

}
