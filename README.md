PHPResty - PHP REST client
==========================

PHPResty is a class which wraps cURL to create a simple REST client. 

This is an example:

```
require_once('PHPResty.php');
$rest = new PHPResty('https://www.google.com');
$data = json_encode(array(
'firstName'=> 'John',
'lastName'=> 'Doe'
));
print_r($rest->post($data));
```

The output

```
Array
(
    [response] => <!DOCTYPE html>
<html lang=en>
  <meta charset=utf-8>
  <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
  <title>Error 405 (Method Not Allowed)!!1</title>
  <style>
    *{margin:0;padding:0}html,code{font:15px/22px arial,sans-serif}html{background:#fff;color:#222;padding:15px}body{margin:7% auto 0;max-width:390px;min-height:180px;padding:30px 0 15px}* > body{background:url(//www.google.com/images/errors/robot.png) 100% 5px no-repeat;padding-right:205px}p{margin:11px 0 22px;overflow:hidden}ins{color:#777;text-decoration:none}a img{border:0}@media screen and (max-width:772px){body{background:none;margin-top:0;max-width:none;padding-right:0}}
  </style>
  <p><b>405.</b> <ins>That’s an error.</ins>
  <p>The request method <code>POST</code> is inappropriate for the URL <code>/</code>.  <ins>That’s all we know.</ins>

    [code] => 405
)
```

You get an array whit response (the data sent back) and the status code, in this case status code is 405