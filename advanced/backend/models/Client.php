<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id_client
 * @property string $name
 * @property string $email
 * @property string $date
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'date'], 'required'],
            [['date'], 'safe'],
            ['date', 'checkDate'],
            [['name', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_client' => 'Id Client',
            'name' => 'Name',
            'email' => 'Email',
            'date' => 'Date',
        ];
    }

    public function checkDate($attribute,$params){
        $today = date('Y-m-d');
        $selectedDate = date($this->date);
        if($selectedDate > $today)
        {
            $this->addError($attribute,'Date Must be smaller '.$selectedDate.' . '.$today);
        }
    }
}
