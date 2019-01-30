<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $status
 * @property int $id_customer
 * @property int $id_executor
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'status', 'id_customer', 'id_executor'], 'required'],
            [['text'], 'string'],
            [['id_customer', 'id_executor'], 'integer'],
            [['title', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'status' => 'Status',
            'id_customer' => 'Id Customer',
            'id_executor' => 'Id Executor',
        ];
    }
}
