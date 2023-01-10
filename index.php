<?php

$params = [
  'name'        => '',
  'fname'       => '',
  'phone'       => '+7',
  'email'       => '',
  'description' => ''
];

$whiteRabbit = new WhiteRabbit();

class WhiteRabbit
{
  private $params = null;
  private $url = 'https://dev.jobcart.ru/wp-json/dev/v1/test/';

  function __construct($params = null) {
    $this->params = $params;
    $this->sendRequest();
  }

  public function sendRequest() {
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded",
        'method'  => 'POST',
        'content' => http_build_query($this->params)
      )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($this->url, false, $context);

    var_dump($result);
  }
}