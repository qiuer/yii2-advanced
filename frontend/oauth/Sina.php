<?php

namespace frontend\oauth;

use yii\authclient\OAuth2;
use Yii;

class Sina extends OAuth2
{
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://api.weibo.com/oauth2/authorize';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://api.weibo.com/oauth2/access_token';
    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://api.weibo.com';

    /** 根据用户ID获取用户信息*/
    public $infoUrl = 'https://api.weibo.com/2/users/show.json?';
    /**
     * @inheritdoc
     */
    public $scope = 'email';

    /**
     * @inheritdoc
     */

    public function getInfo($client)
    {
        $arr_info = array(
            'uid' => $client['uid'],
            'access_token' => $client['access_token'],
        );
        $ch = curl_init($this->infoUrl . http_build_query($arr_info));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $str = curl_exec($ch) ;
        curl_close($ch);

        $info = json_decode($str, true);
        //todo:拼装信息
        return $info;
    }

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'sina';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return '新浪登陆';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 1000,
            'popupHeight' => 500,
        ];
    }
}
