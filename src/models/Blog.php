<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property string $cover_image
 * @property string $categories
 * @property string|null $tags
 * @property string $created_at
 * @property string $updated_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 */
class Blog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'slug', 'categories'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'integer'],
            [['title', 'slug', 'cover_image'], 'string', 'max' => 1000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'slug' => Yii::t('app', 'Slug'),
            'cover_image' => Yii::t('app', 'Cover Image'),
            'categories' => Yii::t('app', 'Categories'),
            'tags' => Yii::t('app', 'Tags'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

	public function create($id = null) {
    	if($this->validate()){
		    if($id){
		    	$model = self::findOne($id);
		    }  else{
		    	$model = new self();
		    }

		    $model->title = $this->title;
		    $model->content = $this->content;
		    $model->slug = $this->slug;

		    $categories = $_POST['Blog']['categories'];
		    $categoryIds = [];

		    foreach ($categories as $category){
		    	$category_model = Category::findOne(['id' => $category]);

		    	if(!$category_model){
		    		$category_model = new Category();
		    		$category_model->name = $category;
		    		$category_model->save();
			    }

			    $categoryIds[] = $category_model->id;
		    }

		    $model->categories = json_encode($categoryIds,JSON_NUMERIC_CHECK);

		    $categories = $_POST['Blog']['tags'];
		    $categoryIds = [];

		    foreach ($categories as $category){
			    $category_model = Tag::findOne(['id' => $category]);

			    if(!$category_model){
				    $category_model = new Tag();
				    $category_model->name = $category;
				    $category_model->save();
			    }

			    $categoryIds[] = $category_model->id;
		    }

		    $model->tags = json_encode($categoryIds,JSON_NUMERIC_CHECK);

		    $model->save();
	    }

	    return $id;
	}
}
