<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\bootstrap\ActiveForm;
use yii\web\BadRequestHttpException;
use  common\component\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * {@inheritdoc}
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


    public function actionInit()
    {
//        $auth = Yii::$app->authManager;
//
//        //----------------permission create--------------------------
//
//        //-----------------ticket----------------------------------
//        $see_ticket = $auth->createPermission('see_ticket');
//        $see_ticket->description = 'ticket editor can see tickets';
//        $auth->add($see_ticket);
//
//        $see_ticket_comment = $auth->createPermission('see_ticket_comment');
//        $see_ticket_comment->description = 'ticket editor can see ticket comments';
//        $auth->add($see_ticket_comment);
//
//        $create_ticket = $auth->createPermission('create_ticket');
//        $create_ticket->description = 'ticket editor can create tickets';
//        $auth->add($create_ticket);
//
//        $update_ticket = $auth->createPermission('update_ticket');
//        $update_ticket->description = 'ticket editor can update tickets';
//        $auth->add($update_ticket);
//
//        $delete_ticket = $auth->createPermission('delete_ticket');
//        $delete_ticket->description = 'ticket editor can delete tickets';
//        $auth->add($delete_ticket);
//
//
//        //-----------------order----------------------------------
//        $see_order = $auth->createPermission('see_order');
//        $see_order->description = 'ticket editor can see order';
//        $auth->add($see_order);
//
//        $see_order_comment = $auth->createPermission('see_order_comment');
//        $see_order_comment->description = 'ticket editor can see order comments';
//        $auth->add($see_order_comment);
//
//        $create_order = $auth->createPermission('create_order');
//        $create_order->description = 'ticket editor can create order';
//        $auth->add($create_order);
//
//        $update_order = $auth->createPermission('update_order');
//        $update_order->description = 'ticket editor can update order';
//        $auth->add($update_order);
//
//        $delete_order = $auth->createPermission('delete_order');
//        $delete_order->description = 'ticket editor can delete order';
//        $auth->add($delete_order);
//
//
//        //-----------------product----------------------------------
//        $see_product = $auth->createPermission('see_product');
//        $see_product->description = 'ticket editor can see product';
//        $auth->add($see_product);
//
//        $see_product_comment = $auth->createPermission('see_product_comment');
//        $see_product_comment->description = 'ticket editor can see order products';
//        $auth->add($see_product_comment);
//
//        $create_product = $auth->createPermission('create_product');
//        $create_product->description = 'ticket editor can create product';
//        $auth->add($create_product);
//
//        $update_product = $auth->createPermission('update_product');
//        $update_product->description = 'ticket editor can update product';
//        $auth->add($update_product);
//
//        $delete_product = $auth->createPermission('delete_product');
//        $delete_product->description = 'ticket editor can delete product';
//        $auth->add($delete_product);
//
//
//        //---------------role create---------------------------------------
//        $ticket_editor = $auth->createRole('ticket_editor');
//        $auth ->add($ticket_editor);
//
//        $order_editor = $auth->createRole('order_editor');
//        $auth ->add($order_editor);
//
//        $product_editor = $auth->createRole('product_editor');
//        $auth ->add($product_editor);
//
//        $ex_admin = $auth->createRole('ex_admin');
//        $auth ->add($ex_admin);
//
//        //-----------------assign role to permission (add child)------------------------
//
//        $auth->addChild($ticket_editor,$see_ticket);
//        $auth->addChild($ticket_editor,$see_ticket_comment);
//        $auth->addChild($ticket_editor,$create_ticket);
//        $auth->addChild($ticket_editor,$update_ticket);
//        $auth->addChild($ticket_editor,$delete_ticket);
//
//
//        $auth->addChild($order_editor,$see_order);
//        $auth->addChild($order_editor,$see_order_comment);
//        $auth->addChild($order_editor,$create_order);
//        $auth->addChild($order_editor,$update_order);
//        $auth->addChild($order_editor,$delete_order);
//
//
//        $auth->addChild($product_editor,$see_product);
//        $auth->addChild($product_editor,$see_product_comment);
//        $auth->addChild($product_editor,$create_product);
//        $auth->addChild($product_editor,$update_product);
//        $auth->addChild($product_editor,$delete_product);
//
//
//        $auth->addChild($ex_admin,$see_product);
//        $auth->addChild($ex_admin,$see_order);
//        $auth->addChild($ex_admin,$see_ticket);
//
//
//
//        //-----------------assign user to role or permission----------------------------
//        //------------------implement in dynamic page ------------------------------------
//





    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */


    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

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
                Yii::$app->session->setFlash('error', 'There was an error sending your messages.');
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
    public function actionTest()
    {
        $res ='';
        if(Yii::$app->request->post())
        {
            $res = 'yes';
        }

        return $this->render('test2',['res' =>$res]);
//        return $this->render('test2');
    }
    public function actionSignup()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {

            Yii::$app->response->format = Response::FORMAT_JSON;
            $attri = $model->activeAttributes();
            foreach ($attri as $id=>$name)
            {
                if($name== 'verify_code')
                {
                    unset($attri[$id]);
                }
            }


            return ActiveForm::validate($model,$attri);

        }
//
        if ( $model->load(Yii::$app->request->post())) {


//            echo 'dded';
//            exit;


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
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
