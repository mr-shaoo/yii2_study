<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%acticle}}".
 *
 * @property string $title
 * @property integer $id
 */
class Acticle extends \yii\db\ActiveRecord
{
    public static $test1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%acticle}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test1','test2','test3'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test2' => 'test2',
            'test1' => 'test1',
            'test3' => 'test3',
        ];
    }
    public static function re_one(){

    }
}
