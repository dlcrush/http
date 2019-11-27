<?php

namespace Crush\Http\Contracts;

interface Http {

    public function setHeaders($headers = []);

    public function getHeaders();

    public function setOptions($options = []);

    public function resetOptions();

    public function getOptions();

    public function get(String $url, $options = []);

    public function post(String $url, $data=[], $options = []);

    public function put(String $url, $data=[], $options = []);

    public function delete(String $url, $options = []);

    public function getAsync(String $url, $options = []);

    public function postAsync(String $url, $data=[], $options = []);

    public function putAsync(String $url, $data=[], $options = []);

    public function deleteAsync(String $url, $options = []);

}
