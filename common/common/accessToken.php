<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/21
 * Time: 上午11:11
 */

namespace common\common;

class AccessToken
{
    public  $access_token;

    public function  __construct($appid = null , $appsecret = null)
    {
        if (empty($appid) || empty($appsecret)) {
            $appid = \Yii::$app->params['appid'];
            $appsecret = \Yii::$app->params['appsecret'];
        }
        if (empty($this->access_token)) {
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
            $res = $this->http_request($url);
            $result = json_decode($res, true);
            $this->access_token = $result["access_token"];
            \Yii::$app->cache->set('access_token', $this->access_token, 7200);
        }
    }

    protected function http_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}