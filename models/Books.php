<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $preview
 * @property integer $date_create
 * @property integer $date_update
 * @property integer $date
 * @property integer $author_id
 *
 * @property Authors $author
 */
class Books extends \yii\db\ActiveRecord
{

    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create', 'name'], 'required'],
            [['date_create', 'date_update',  'author_id'], 'integer'],
            [['name', 'date', 'preview'], 'string', 'max' => 60],
            [['image'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'preview' => 'Preview',
            'image' => 'Image',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'date' => 'Date',
            'author_id' => 'Author ID',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_create',
                'updatedAtAttribute' => 'date_update',
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    public function getPreviewUrl()
    {
        return Yii::getAlias('@img') . '/' . $this->preview;
    }

    public function getLightBox()
    {
        return "<a href='" . $this->getPreviewUrl() . "' rel='lightbox'>
                                <img width='40' height='40' src='" . $this->getPreviewUrl() . "'>
               </a>";
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->preview = $this->image->baseName    . '.' . $this->image->extension;
            $this->image->saveAs($this->getPreviewUrl());
            $this->image = '';

            return true;
        } else {
            return false;
        }
    }
    
    public static function getGridColumns()
    {
        return [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'preview',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return $model->getLightBox();
                },
            ],
            [
                'attribute' => 'date_create',
                'format'    => 'date',
            ],
            [
                'attribute' => 'date_update',
                'format'    => 'date',

            ],
            // 'date',
            // 'author_id',
            [
                'attribute' => 'author_id',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return $model->author->getName();
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ];
    }
}

