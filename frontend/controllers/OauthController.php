<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/4
 * Time: 下午1:28
 */

namespace frontend\controllers;


use yii\authclient\OAuth2;
use yii\web\Controller;

class OauthController extends Controller
{
    public function actions()
    {
        return [
            'qq' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ]
        ];
    }

    public function successCallback($client)
    {
        var_dump($client);die;
        $attributes = $client->getUserAttributes();
        var_dump($attributes);die;
    }

} 