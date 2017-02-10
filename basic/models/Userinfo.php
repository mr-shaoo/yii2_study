<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "{{%userinfo}}".
 *
 * @property integer $id
 * @property integer $age
 * @property string $pass
 * @property string $name
 * @property integer $status
 */
class Userinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%userinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'status'], 'integer'],
            [['pass', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'age' => 'Age',
            'pass' => '密码',
            'name' => '名字',
            'status' => 'Status',
        ];
    }
}
