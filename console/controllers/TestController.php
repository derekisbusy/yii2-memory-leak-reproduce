<?php

namespace console\controllers;

use common\models\User;
use Yii;
use yii\helpers\VarDumper;


class TestController extends \yii\console\Controller
{

    public function actionIndex()
    {
        $user = new User();
        $user->username = 'test';
        var_dump($user->save(false));

        VarDumper::dump(['YII_DEBUG' => YII_DEBUG, 'YII_ENV' => YII_ENV]);
        echo PHP_EOL;
        Yii::getLogger()->flushInterval = 1;
        $count = 0;
        while (true) {
            $user = User::find()->one();
            unset($user);
            $count++;
            if ($count % 10000 == 0) {
                Yii::getLogger()->flush();
                gc_collect_cycles();
                echo memory_get_usage(), PHP_EOL;
            }
        }
    }
}