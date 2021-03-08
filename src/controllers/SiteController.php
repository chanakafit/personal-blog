<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;

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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionResume()
    {
        return $this->render('resume');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionContribution()
    {
        return $this->render('contribution');
    }

	/**
	 * Login action.
	 *
	 * @return Response|string
	 */
	public function actionLogin() {
		if ( ! Yii::$app->user->isGuest ) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ( $model->load( Yii::$app->request->post() ) && $model->login() ) {
			return $this->goBack();
		}

		$model->password = '';

		return $this->render( 'login', [
			'model' => $model,
		] );
	}


	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionRequestPasswordReset() {
		$model = new PasswordResetRequestForm();
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			if ( $model->sendEmail() ) {
				Yii::$app->session->setFlash( 'success', 'Check your email for further instructions.' );

				return $this->goHome();
			} else {
				Yii::$app->session->setFlash( 'error', 'Sorry, we are unable to reset password for the provided email address.' );
			}
		}

		return $this->render( 'requestPasswordResetToken', [
			'model' => $model,
		] );
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 *
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword( $token ) {
		try {
			$model = new ResetPasswordForm( $token );
		} catch ( \Exception $e ) {
			Yii::$app->session->setFlash( 'error', $e->getMessage() );
			return $this->goHome();
		}

		if ( $model->load( Yii::$app->request->post() ) && $model->validate() && $model->resetPassword() ) {
			Yii::$app->session->setFlash( 'success', 'New password saved.' );

			return $this->goHome();
		}

		return $this->render( 'resetPassword', [
			'model' => $model,
		] );
	}
}
