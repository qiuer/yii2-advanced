<?php
namespace frontend\controllers;

use common\models\ThirdConfig;
use common\models\UnionMember;
use frontend\oauth\Wechat;
use Yii;

use yii\base\Exception;
use yii\web\Controller;


class UnionController extends Controller
{
    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    public function successCallback($client)
    {
        parse_str(Yii::$app->getRequest()->queryString, $params);
        switch($params['authclient']) {
            case 'tencent':
                $info = $client->getOpenId($client->getUserAttributes());
                $info['source'] = ThirdConfig::TYPE_QQ;
                break;

            case 'sina':
                $info = $client->getInfo($client->getAccessToken()->getparams());
                $info['source'] = ThirdConfig::TYPE_WEIBO;
                break;

            case 'douban':
                $info = $client->getInfo($client->getAccessToken()->getparams());
                $info['source'] = ThirdConfig::TYPE_DOUBAN;
                break;

            default: throw new Exception("The request is invalid");
        }

        Yii::$app->session->set('union-info', $info);
        return $this->getJudge();
    }

    public function actionWechat($code, $state)
    {
        if (Yii::$app->session->get('oauth-state') != $state) {
            throw new Exception('Non site request, illegal!');
        }
        $client = Yii::$app->get('authClientCollection')->getClient('wechat');
        $info = $client->getUnionId($code);
        $info['source'] = ThirdConfig::TYPE_WEIXIN;

        Yii::$app->session->set('union-info', $info);
        return $this->getJudge();
    }

    public function getJudge()
    {
        $someone = UnionMember::find()->where(['openid' => Yii::$app->session->get('union-info')['openid']])->one();
        if (!empty($someone)) {
           $member = $someone->member;
            Yii::$app->user->login($member, 3600);
        } else {
            return $this->redirect(['/union/signup']);
        }
    }

    public function actionSignup()
    {

    }

    private function getDown()
    {
        $name = 'img'.date('YmdHis', time()). '-' . rand(5, 20) . '.jpg';
        $file = Yii::getAlias('@public').'/avatar_images/'.$name;
        $img = file_get_contents(Yii::$app->session['union']['img']);
        file_put_contents($file, $img);
        return $name;
    }

}