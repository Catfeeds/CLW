<?php

namespace App\Exceptions;

use App\Http\Controllers\API\Admin\AcceptMessagesController;
use App\Http\Requests\Admin\AcceptMessagesRequest;
use App\Repositories\AcceptMessagesRepository;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (empty(config('app.debug', false))) {
            $errorInfo = '';
            if (!empty(method_exists($exception, 'getStatusCode'))) {
                if ($exception->getStatusCode() != 404) {
                    $errorInfo = $this->errorMessage($exception);
                }
            } else {
                $errorInfo = $this->errorMessage($exception);
            }
            // 获取错误类型
            $temp = explode('\\', get_class($exception));
            $type = end($temp);
            $class = new AcceptMessagesController(new AcceptMessagesRepository(),new AcceptMessagesRequest());
            $openid = $class->getOpenid(3);
            $data['type'] = $type;
            $data['name'] = config('app.name');
            $data['errorInfo'] = $errorInfo;
            $data['openid'] = json_encode($openid);
            curl(config('setting.wechat_url').'/waring_notice','post',$data);
        }

        if ($exception instanceof ValidationException) {
            $error = array(
                'success' => false,
                'message' => current($exception->errors())[0]
            );
            return response($error, 422);
        }
        return parent::render($request, $exception);
    }

    /**
     * 说明: 错误信息拼接
     *
     * @param $exception
     * @return string
     * @author 罗振
     */
    public function errorMessage($exception)
    {
        $file = $exception->getFile(); // 报错文件
        $line = $exception->getLine(); // 报错行数
        $message = $exception->getMessage();    // 报错信息

        return $file.'文件的'.$line.'行报错,报错信息为:'.$message;
    }
}
