<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 *
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{
    public $name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }
    
    public static function getAuthors(){

        $models = self::find()->all();

        return ArrayHelper::map($models, 'id',  function(Authors $model) {
            return $model->first_name . ' ' . $model->last_name;
        });
    }
}
