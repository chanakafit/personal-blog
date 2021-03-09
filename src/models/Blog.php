<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $slug
 * @property string|null $cover_image
 * @property string|null $category
 * @property string|null $tags
 * @property string $created_at
 * @property string $updated_at
 * @property int|null $created_by
 */
class Blog extends \yii\db\ActiveRecord
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
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'integer'],
            [['title', 'slug', 'cover_image', 'category'], 'string', 'max' => 1000],
            [['tags'], 'string', 'max' => 255],
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
            'category' => Yii::t('app', 'Category'),
            'tags' => Yii::t('app', 'Tags'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }
}
