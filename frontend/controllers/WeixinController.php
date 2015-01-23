<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/21
 * Time: 上午11:39
 */

namespace frontend\controllers;

use common\common\AccessToken;
use yii\web\Controller;

class WeixinController extends Controller
{
//    public function actions()
//    {
//        return [
//            'accessToken' => [
//                'class' => 'common\action\AccessToken',
//            ]
//        ];
//    }

    public function actionIndex()
    {
        $weixin = new AccessToken();
        $token = \Yii::$app->cache->get('access_token');
        var_dump($token);die;
    }
} 