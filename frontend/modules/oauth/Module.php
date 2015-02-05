<?php

namespace frontend\modules\oauth;

use common\models\ThirdConfig;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\oauth\controllers';

    public function init()
    {
        parent::init();

        $oauthConfigs = ThirdConfig::find()->where(['status' => 1])->all();

        $clients = [];

        foreach ($oauthConfigs as $oauthConfig) {
            switch ($oauthConfig->type) {
                case 1 : $clients['tencent'] = [
                                'class' => 'frontend\modules\oauth\clients\Tencent',
                                'clientId' => $oauthConfig->app_id,
                                'clientSecret' => $oauthConfig->app_secret,
                            ];break;
                case 2 : $clients['sina'] = [
                                'class' => 'frontend\modules\oauth\clients\Sina',
                                'clientId' => $oauthConfig->app_id,
                                'clientSecret' => $oauthConfig->app_secret,
                            ];break;
                case 3 : $clients['douban'] = [
                                'class' => 'frontend\modules\oauth\clients\Douban',
                                'clientId' => $oauthConfig->app_id,
                                'clientSecret' => $oauthConfig->app_secret,
                            ];break;
//                case 4 : $clients['sina'] = [
//                                'class' => 'frontend\modules\oauth\clients\Sina',
//                                'clientId' => $oauthConfig->app_id,
//                                'clientSecret' => $oauthConfig->app_secret,
//                            ];break;
            }
        }

        $component = Yii::$app->getComponents();

        $component['authClientCollection'] = [
            'class' => 'yii\authclient\Collection',
            'clients' => $clients
        ];

        Yii::$app->setComponents($component);
    }
}
