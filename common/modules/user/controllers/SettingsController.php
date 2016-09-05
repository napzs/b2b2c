<?php
/**
 *
 * hbshop
 *
 * @package   SettingsController
 * @copyright Copyright (c) 2010-2016, Orzm.net
 * @license   http://opensource.org/licenses/GPL-3.0    GPL-3.0
 * @link      http://orzm.net
 * @author    Alex Liu<lxiangcn@gmail.com>
 */

namespace common\modules\user\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;
use common\modules\user\models\Profile;
use yii\imagine\Image;
use common\models\Attachment;
use Yii;

class SettingsController extends Controller
{
    public function behaviors()
    {
        return [
            'accessControl' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionProfile()
    {
        $userId = \Yii::$app->user->id;
        $profile = Profile::find()->where(['user_id' => $userId])->one();
        if ($profile->load(\Yii::$app->request->post()) && $profile->save()) {
            return $this->redirect(['profile']);
        } else {
            return $this->render('profile', [
                'model' => $profile
            ]);
        }
    }
    public function actionAvatar()
    {
        $user = \Yii::$app->user->identity;

        if (Yii::$app->getRequest()->isAjax) {
            $avatar = Yii::$app->getRequest()->post("avatar");
            $x = Yii::$app->getRequest()->post("x");
            $y = Yii::$app->getRequest()->post("y");
            $w = Yii::$app->getRequest()->post("w");
            $h = Yii::$app->getRequest()->post("h");
            $attachment = Attachment::findOne($avatar);
            $original= $attachment->filePath;
            $fileInfo = pathinfo($original);
            $target = $fileInfo['dirname'] . '/' . $fileInfo['filename'] . '_avatar.' . $fileInfo['extension'];
            Image::crop($original, $w, $h, [
                $x,
                $y
            ])->save($target);
            $targetUrl = Yii::$app->storage->path2url($target);
            $user->saveAvatar($targetUrl);

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $result = [
                'status' => true,
                'msg' => '保存成功'
            ];
            return $result;
        }

        return $this->render('avatar', [
            'user' => $user
        ]);
    }
}