<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Topictype;
use backend\models\Documenttype;
use backend\models\Topic;
use backend\models\Document;
use backend\models\Documentitem;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $topicType = Topictype::find()->asArray()->all();
        Yii::$app->view->params['topicType'] = $topicType;

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * @return mixed
     */
    public function actionIndex()
    {


        if(isset($_POST['topicTypeId'])){
            $id = $_POST['topicTypeId'];
            //echo $id;
            $data = Documenttype::find()
                ->where("TopicTypeId=".$id)
                ->all();
            //print_r($data);
            return $this->render('index', array('documenttype'=> $data));

        }else{


            return $this->render('index');
        }

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'loginlayout';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
            //return $this->actionIndex();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
        //return $this->actionLogin();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /*public function actionGet(){
        if(isset($_POST['topicTypeId'])){
            $id = $_POST['topicTypeId'];
            $returnArray = array();
            $data = Documenttype::find()
                ->where("TopicTypeId=".$id)
                ->all();
            foreach($data as $d){
                $arr['name'] = $d['Name'];
                $arr['documentTypeId'] = $d['DocumentTypeId'];
                $arr['topicTypeId'] = $d['TopicTypeId'];
                array_push($returnArray, $arr);
            }
            echo json_encode($returnArray);
            //print_r($data);
           // return $this->render('index', array('documenttype'=> $data));

         }
    }*/

    public function actionGet($id){
        $topictype = Topictype::find()->where("topictypeid=".$id)->one();
            $data = Documenttype::find()
                ->where("TopicTypeId=".$id)
                ->all();
           /* foreach($data as $d){
                $arr['name'] = $d['Name'];
                $arr['documentTypeId'] = $d['DocumentTypeId'];
                $arr['topicTypeId'] = $d['TopicTypeId'];
                array_push($returnArray, $arr);
            }*/
            //echo json_encode($returnArray);
            //print_r($data);
             return $this->render('get', array('documenttype'=> $data, 'topictype'=>$topictype));
    }



    public function actionComponents($id){
    // $documnttypeId  =  Yii::$app->getRequest()->getQueryParam($id);
        //echo $id;
        $documentTypeName = Documenttype::find()
            ->where("documenttypeid=".$id)->one();
        //print_r($documentTypeName);
        $sql = 'SELECT * FROM topic WHERE topicid IN (SELECT topicid FROM documenttypetopic WHERE documenttypeid = '.$id.')';
        $data = Topic::findBySql($sql)->all();
       // print_r($data); exit;
        return $this->render('components', array('topic'=> $data, 'documentTypeName'=>$documentTypeName));
    }


    public function actionSecondary(){
        if(isset($_POST['topicId'])){
            $topicId = $_POST['topicId'];
            $returnArray = array();
            $data = Topic::find()
                ->where("ParentTopicId=".$topicId)
                ->all();
            foreach($data as $d){
                $arr['name'] = $d['Name'];
                $arr['topicId'] = $d['TopicId'];
                array_push($returnArray, $arr);
            }
            echo json_encode($returnArray);
        }

    }


    public function actionPrimarydocument(){
        if(isset($_POST['topicId']) && isset($_POST['documentTypeId'])){
           $topicId = $_POST['topicId'];
            $documentTypeId = $_POST['documentTypeId'];
            $returnArray = array();
            $sql = 'SELECT * FROM document WHERE documenttypeid ='.$documentTypeId.' AND topicid IN (SELECT topicid FROM topic WHERE Parenttopicid ='.$topicId.')';
            $data = Document::findBySql($sql)->all();
            //print_r($data);
            foreach($data as $d){
                $arr['documentId'] = $d['DocumentId'];
                $arr['title'] = $d['Title'];
                $arr['intro'] = $d['Intro'];
                $arr['number'] = $d['Number'];
                $arr['year'] = $d['Year'];
                array_push($returnArray, $arr);
            }
            echo json_encode($returnArray);

        }
    }


    public function actionSecondarydocument(){
        if(isset($_POST['topicId']) && isset($_POST['documentTypeId'])){
            $topicId = $_POST['topicId'];
            $documentTypeId = $_POST['documentTypeId'];
            $returnArray = array();
            $sql = 'SELECT * FROM document WHERE documenttypeid ='.$documentTypeId.' AND topicid ='.$topicId;
            //print_r($sql); exit;
            $data = Document::findBySql($sql)->all();
            //print_r($data);
            foreach($data as $d){
                $arr['documentId'] = $d['DocumentId'];
                $arr['title'] = $d['Title'];
                $arr['intro'] = $d['Intro'];
                $arr['number'] = $d['Number'];
                $arr['year'] = $d['Year'];
                array_push($returnArray, $arr);
            }
            echo json_encode($returnArray);

        }
    }


    public function actionDocument($id){
        //echo $id;
        $data = Document::find()
            ->where("documentid=".$id)->one();

       /* $sql = 'SELECT documenttype.name
                        FROM document, documenttype
                        WHERE documenttype.documenttypeid = document.documenttypeid
                        AND document.documentid ='.$id;

        $documenttypename = Documenttype::findBySql($sql)->all();
        print_r($documenttypename); exit;*/

        $documentItem = Documentitem::find()->where("documentid=".$id)->all();
        return $this->render('document', array('document'=> $data, 'documentitem'=>$documentItem));
    }





    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}
