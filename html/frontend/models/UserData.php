<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_data".
 *
 * @property int $id
 * @property int $uid
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_day
 * @property int $date_change
 * @property string $description
 * @property int $save_status
 */
class UserData extends \yii\db\ActiveRecord
{
    const STATUS_DELETE = 0;
    const STATUS_INSERT = 1;
    const STATUS_UPDATE = 2;
    const STATUS_IGNORE = 3;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['id', 'uid', 'first_name', 'last_name', 'birth_day', 'date_change', 'description', 'save_status'], 'required'],
            [['id', 'uid', 'date_change', 'save_status'], 'integer'],
            [['description'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 250],
            [['birth_day'], 'string', 'max' => 12],
            [['uid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birth_day' => 'Birth Day',
            'date_change' => 'Date Change',
            'description' => 'Description',
            'save_status' => 'Save Status',
        ];
    }
}
