<?php

namespace frontend\oauth;

use yii\authclient\OAuth2;
use Yii;

class Tencent extends OAuth2
{
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://graph.qq.com/oauth2.0/authorize';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://graph.qq.com/oauth2.0/token';
    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://graph.qq.com';

    public $meUrl = 'https://graph.qq.com/oauth2.0/me?';

    public $infoUrl = 'https://graph.qq.com/user/get_user_info?';

    /**
     * @inheritdoc
     */
    public $scope = 'get_user_info';

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        return $this->api('oauth2.0/me', 'GET');
    }

    public function processResponse($rawResponse, $contentType = self::CONTENT_TYPE_AUTO)
    {
        parse_str($rawResponse, $arr);
        return $arr;
    }

    public function getInfo($openid)
    {
        $arr_info = array(
            'access_token' => $this->getAccessToken()->getToken(),
            'oauth_consumer_key' => $this->clientId,
            'openid' => $openid
        );
        $str  = file_get_contents($this->infoUrl . http_build_query($arr_info));
        $info = json_decode($str, true);
        $info['openid'] = $openid;
        return $info;
    }

    public function getOpenId($attributes)
    {
        if (strpos(key($attributes), "callback") !== false) {
            $lpos = strpos(key($attributes), "(");
            $rpos = strrpos(key($attributes), ")");
            $str  = substr(key($attributes), $lpos + 2, $rpos - $lpos -3 );
        }
        $user = json_decode($str, true);
        return $this->getInfo($user['openid']);
    }

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'tencent';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return 'QQ登陆';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 1000,
            'popupHeight' => 500,
        ];
    }
}
