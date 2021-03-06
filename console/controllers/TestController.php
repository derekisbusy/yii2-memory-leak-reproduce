<?php

namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Exception;
use yii\helpers\VarDumper;


class TestController extends \yii\console\Controller
{

    public function actionIndex()
    {
        $user = new User();
        $user->username = 'test';
        if(!$user->save(false)) {
            throw  new Exception("Test failed: user was not created.");
        }

        VarDumper::dump(['YII_DEBUG' => YII_DEBUG, 'YII_ENV' => YII_ENV]);
        echo PHP_EOL;
        Yii::getLogger()->flushInterval = 1;
        $count = 0;
        while (true) {
            $user = User::find()->one();
            $count++;
            if ($count % 1000 == 0) {
                Yii::getLogger()->flush();
                gc_collect_cycles();
                echo memory_get_usage(), PHP_EOL;
            }
        }
    }
}