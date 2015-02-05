<?php

namespace frontend\oauth;
use yii\authclient\OAuth2;
use Yii;

class Wechat extends OAuth2
{
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://open.weixin.qq.com/connect/qrconnect';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token?';
    /**
     * @inheritdoc
     */
    public $userInfoUrl = 'https://api.weixin.qq.com/sns/userinfo';

    /**
     * @inheritdoc
     */
    public function buildAuthUrl(array $params = [])
    {
        $state = rand(1, 9999);
        Yii::$app->session->set('oauth-state', $state);//避免攻击

        $returnUrl = Yii::$app->request->hostInfo . '?r=union%2Fwechat';
        $defaultParams = [
            'appid' => $this->clientId,
            'response_type' => 'code',
            'redirect_uri' => $returnUrl,
            'xoauth_displayname' => Yii::$app->name,
            'scope' => 'snsapi_login',
            'state' => $state
        ];
        $params =  http_build_query($defaultParams, '&');
        return $this->authUrl . '?' .  $params;
    }

    public function fetchAccessToken($authCode, array $params = [])
    {
        $defaultParams = [
            'appid' => $this->clientId,
            'secret' => $this->clientSecret,
            'code' => $authCode,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->getReturnUrl(),
        ];
        $response = $this->sendRequest('POST', $this->tokenUrl, array_merge($defaultParams, $params));
        $token = $this->createToken(['params' => $response]);
        $this->setAccessToken($token);

        return $token;
    }

    public function getUnionId($code)
    {
        $fetchAccessToken = $this->fetchAccessToken($code);
        $openid = $fetchAccessToken->params['openid'];
        $accessToken = $fetchAccessToken->params['access_token'];
        $params = [
            'access_token' => $accessToken,
            'openid' => $openid,
        ];
        return $this->sendRequest('GET', $this->userInfoUrl, $params);
    }

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'wechat';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return '微信登陆';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 1000,
            'popupHeight' => 500,
        ];
    }
}