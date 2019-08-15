<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\db\Query;
use frontend\models\UploadForm;
use frontend\models\UserData;
use yii\data\ActiveDataProvider;

/**
 * Csvupload controller
 */
class CsvimportController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow'   => true,
                        'roles'   => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $modeUploadForm = new UploadForm();

        if (Yii::$app->request->isPost) {

            $modeUploadForm->file      = UploadedFile::getInstances($modeUploadForm, 'file');
            $modeUploadForm->savePatch = $modeUploadForm->upload();

            if ($modeUploadForm->savePatch != false) {// file is uploaded successfully
                $arrResult = $modeUploadForm->insertCsv();

                $dataProvider = new ActiveDataProvider([
                    'query'      => UserData::find(),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
        
                return $this->render('csvInsertResult', [
                            'resultImport' => $arrResult['resultImport'],
                            'dataProvider' => $dataProvider,
                ]);
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query'      => UserData::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
                    'modeUploadForm' => $modeUploadForm,
                    'dataProvider'   => $dataProvider,
        ]);
    }
}
