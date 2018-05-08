<?php

return [
    // 短信发送开关（查看验证码。在redis中查看）
    'open' => false,
    /*
    |--------------------------------------------------------------------------
    | 短信配置
    |--------------------------------------------------------------------------
    |
    */
    'set' => [
        'send_url' => 'http://sms.253.com/msg/send?',
        'banlance_query_url' => 'http://sms.253.com/msg/balance?',
        'account' => 'N1091596',
        'password' => 'WwoTtAPEK9a9ce',
        'prefix' => '【SMS-MATE】'
    ],

    'louWang' => [
        'postfix' => '[楚楼网]',
        'register' => "动态验证码：%s,您正在注册帐号,请输入验证码完成手机号码验证（%s分钟内有效）。如非本人操作，请忽略此短信。%s",
        'resetPwd' => "短信验证码：%s,您正在修改帐号登录密码,请输入验证码完成验证（%s分钟内有效）,请勿泄露短信验证码。%s",
        'common' => "%s尊敬的客户，您的本次验证码为：%s，请注意保密!若非本人操作，请直接无视该信息。%s",
    ],

    'template' => [
        'register' => "%s尊敬的客户，您的本次验证码为：%s，请注意保密!若非本人操作，请直接无视该信息。%s",
        'reset_password' => "%s尊敬的客户，您的帐号密码已重置，帐号：%s，密码：%s，注意保密！%s",
        'common' => "%s尊敬的客户，您的本次验证码为：%s，请注意保密!若非本人操作，请直接无视该信息。%s",
    ],
];
