<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>
    <img src=" {{ url('captcha/1') }} " />
    <input type="text" name="code"  id="code" onchange="getCode(this)">
    <a href=" {{url('sms/captcha/15926298802/1')}} "> 跳转</a>
</h1>
<script>
    function getCode(obj) {
        var temp = document.getElementsByTagName('a')[0].href;
        document.getElementsByTagName('a')[0].href = temp + '/' + obj.value;
    }
</script>

</body>
</html>