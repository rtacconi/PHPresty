<?php
class PHPResty {
  private $headers;
  private $handle;
  
  public function __construct($url) {
    $this->headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
    );

    $this->handle = curl_init();
    curl_setopt($this->handle, CURLOPT_URL, $url);
    curl_setopt($this->handle, CURLOPT_HTTPHEADER, $this->headers);
    curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->handle, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($this->handle, CURLOPT_SSL_VERIFYPEER, false);    
  }
  
  public function setHeaders($headers) {
    $this->headers = $headers;
  }
  
  private function send($data) {
    $response = curl_exec($this->handle);
    $code = curl_getinfo($this->handle, CURLINFO_HTTP_CODE);

    return array('response' => $response, 'code' => $code);
  }
  
  public function get($data) {
    return $this->send($data);
  }
  
  public function post($data) {
    curl_setopt($this->handle, CURLOPT_POST, true);
    curl_setopt($this->handle, CURLOPT_POSTFIELDS, $data);
    return $this->send($data);
  }
  
  public function put($data) {
    curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($this->handle, CURLOPT_POSTFIELDS, $data);
    return $this->send($data);
  }
  
  public function delete($data) {
    curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
    return $this->send($data);
  }
}