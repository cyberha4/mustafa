<?php

namespace app\controllers;

use app\models\Files;
use app\models\UploadForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'add'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new UploadForm();

        $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isPost) {
            echo $model->fileName;
            echo $model->category;

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
//                return $this->render('index');
                return;
            }
        }
        return $this->render('index', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFile($fileName = NULL) {
        $fileName = Yii::$app->request->get('file');
        if ($fileName !== NULL) {
            // некоторая логика по обработке пути из url в путь до файла на сервере
            $currentFile = Yii::$app->basePath.'/upload/'  . $fileName;

            if (is_file($currentFile)) {
                echo 223232323;
            } else echo '!!!!!!!!!!!!!!!!';
//                \Yii::t('app', '!!!!!!!!!!!!!!!!!!');
//                header("Content-Type: application/octet-stream");
//                header("Accept-Ranges: bytes");
//                header("Content-Length: " . filesize($currentFile));
//                header("Content-Disposition: attachment; filename=" . $fileName);
//                readfile($currentFile);
//            }
        } else {
            $this->redirect('куда переправляем юзера в случае ошибки');
        }
    }

    public function actionFiles(){
        
        $category = Yii::$app->request->get('category');

        $files = Files::find()
            ->where(['category' => Files::CATEGORIES[$category]])
            ->all();

        return $this->render('files', [
            'files' => $files,
        ]);
    }

    public function actionAdd(){

        $model = new UploadForm();

        $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isPost) {
            echo $model->fileName;
            echo $model->category;

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                 $this->redirect('/');
            }
        }
        return $this->render('add', ['model' => $model]);
    }

//    public function actionUpload()
//    {
//        $model = new UploadForm();
//
//        $model->load(Yii::$app->request->post());
//
//        if (Yii::$app->request->isPost) {
//            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
//            if ($model->upload()) {
//                // file is uploaded successfully
//                return;
//            }
//        }
//
//        return $this->render('index', ['model' => $model]);
//    }

}
