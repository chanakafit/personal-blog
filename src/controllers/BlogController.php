<?php

namespace app\controllers;

use app\models\Category;
use app\models\Tag;
use Yii;
use app\models\Blog;
use app\models\BlogSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller {
	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs'  => [
				'class'   => VerbFilter::class,
				'actions' => [
					'delete' => [ 'POST' ],
				],
			],
			'access' => [
				'class' => AccessControl::class,
				'only'  => [ 'logout' ],
				'rules' => [
					[
						'actions' => [ 'create', 'update', 'delete' ],
						'allow'   => true,
						'roles'   => [ '@' ],
					],
				],
			],
		];
	}

	/**
	 * Lists all Blog models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new BlogSearch();
		$dataProvider = $searchModel->search( Yii::$app->request->queryParams );

		return $this->render( 'index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		] );
	}

	/**
	 * Displays a single Blog model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView( $id ) {
		return $this->render( 'view', [
			'model' => $this->findModel( $id ),
		] );
	}

	/**
	 * Creates a new Blog model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Blog();

		$categories = Category::find()->all();
		$tags = Tag::find()->all();

		if ( $model->load( Yii::$app->request->post() ) && $id = $model->create() ) {
			return $this->redirect( [ 'view', 'id' => $id ] );
		}

		return $this->render( 'create', [
			'model' => $model,
			'categories' => ArrayHelper::map($categories,'id','name'),
			'tags' => ArrayHelper::map($tags,'id','name'),
		] );
	}

	/**
	 * Updates an existing Blog model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate( $id ) {
		$model = $this->findModel( $id );

		$categories = Category::find()->all();
		$tags = Tag::find()->all();

		$model->categories = json_decode($model->categories);
		$model->tags = json_decode($model->tags);

		if ( $model->load( Yii::$app->request->post() ) && $model->create($id) ) {
			return $this->redirect( [ 'view', 'id' => $model->id ] );
		}

		return $this->render( 'update', [
			'model' => $model,
			'categories' => ArrayHelper::map($categories,'id','name'),
			'tags' => ArrayHelper::map($tags,'id','name'),
		] );
	}

	/**
	 * Deletes an existing Blog model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete( $id ) {
		$this->findModel( $id )->delete();

		return $this->redirect( [ 'index' ] );
	}

	/**
	 * Finds the Blog model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Blog the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel( $id ) {
		if ( ( $model = Blog::findOne( $id ) ) !== null ) {
			return $model;
		}

		throw new NotFoundHttpException( Yii::t( 'app', 'The requested page does not exist.' ) );
	}
}
