<?php

namespace frontend\oauth;

use yii\authclient\OAuth2;
use Yii;

class Douban extends OAuth2
{
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://www.douban.com/service/auth2/auth';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://www.douban.com/service/auth2/token';
    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://www.douban.com';

    public $infoUrl = 'http://api.douban.com/people/';
    /**
     * @inheritdoc
     */
    public $scope = 'email';

    public function getInfo($response)
    {
        $str  = file_get_contents($this->infoUrl . $response['douban_user_id']);
        $xml = simplexml_load_string($str);
        $img = $xml->link[2];
        $info = array(
            'nickname' => (string)$xml->title,
            'headimgurl' => (string)$img['href'],
            'openid' => $response['douban_user_id'],
        );

        return $info;
    }

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'douban';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return '豆瓣登陆';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 1000,
            'popupHeight' => 500,
        ];
    }
}
