<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "search_quaries".
 *
 * @property int $id
 * @property int $created_at
 * @property string $quary
 * @property int $user_id
 * @property string $region
 */
class SearchQuary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'search_quaries';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'quary', 'user_id', 'region'], 'required'],
            [['created_at', 'user_id'], 'integer'],
            [['quary'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'quary' => 'Quary',
            'user_id' => 'User ID',
        ];
    }


}
