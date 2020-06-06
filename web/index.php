<?php

require_once '../app/bootsrap.php';

use App\Http\Request;
use App\Http\Response;
use Domain\Services\Calculator;

$request = Request::create();
///Controller
$pageNum = (int)$request->getUrlParam('page');

if ($pageNum === 13) {
    $response = Response::createRedirectResponse('http://dolist2.loc?page=14');
} else {
    $response = Response::create();
}

    //Business Logic
    $calculator = new Calculator();
    $result = $calculator->summ(
        $request->getUrlParam('d1', 0),
        $request->getUrlParam('d2', 1)
    );

    $response->setBody($result);


//// End Controller
$response->send();