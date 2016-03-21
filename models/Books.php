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
            [['date_create'], 'required'],
            [['date_create', 'date_update', 'date', 'author_id'], 'integer'],
            [['name', 'preview'], 'string', 'max' => 60]
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
                    return "<a href='" . $model->getPreviewUrl() . "' rel='lightbox'>
                                <img width='20' height='20' src='" . $model->getPreviewUrl() . "'>
                            </a>";
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
                    return $model->author->first_name . ' ' . $model->author->last_name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ];
    }
}

