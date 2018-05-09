<?php

namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\ServiceRecommendsRepository;


class ServiceRecommendsController extends APIBaseController
{
    protected $repo;

    public function __construct
    (
        ServiceRecommendsRepository $repository

    )
    {
        $this->repo = $repository;

    }
    public function index()
    {
       $res = $this->repo->getList();
       return $this->sendResponse($res,'获取推荐服务列表');
    }



}
