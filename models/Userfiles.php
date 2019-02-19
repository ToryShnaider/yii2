<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userfiles".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $path
 * @property string $title
 */
class Userfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userfiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'path', 'title'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'path', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => 'ID',
//            'user_id' => 'User ID',
//            'name' => 'Name',
//            'path' => 'Path',
//            'title' => 'Title',
//        ];
//    }
}
