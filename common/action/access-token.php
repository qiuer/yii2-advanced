<?php
/**
 * Created by PhpStorm.
 * User: qxm
 * Date: 14/11/21
 * Time: 下午2:36
 */
namespace common\action;

class AccessToken extends \yii\base\Action
{
    public $app_id;
    public $app_secret;
    public $access_token;

    public function run()
    {
        if (empty($this->app_id) || empty($this->app_secret)) {
            $this->app_id = \Yii::$app->params['appid'];
            $this->app_secret = \Yii::$app->params['appsecret'];
        }
        if (empty($this->access_token)) {
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->app_id."&secret=".$this->app_secret;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $res = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($res, true);
            $this->access_token = $result["access_token"];
            \Yii::$app->cache->set('access_token', $this->access_token, 7200);
        }
    }
}