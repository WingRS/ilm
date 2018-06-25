<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invitation_model".
 *
 * @property int $id
 * @property string $email
 * @property string $invite_string
 * @property string $created_at
 * @property int $is_active
 * @property string $used_at
 */
class Invitation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invitation_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'used_at'], 'safe'],
            [['is_active'], 'integer'],
            [['email', 'invite_string'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'invite_string' => 'Код запрошення',
            'created_at' => 'Дата створення',
            'is_active' => 'Статус',
            'used_at' => 'Дата Використання',
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $this->invite_string = Yii::$app->security->generateRandomString();
        if( $this->isNewRecord) {
            $this->is_active = true;
        }
        $this->sendInvitation();
        return parent::save($runValidation, $attributeNames);
    }

    private function sendInvitation() {
        Yii::$app
            ->mailer
            ->compose(
                ['html' =>'invitation-html', 'text'=>'invitation-text'],
                [
                    'model' => $this
                ]
            )
            ->setFrom('yra100@gmail.com')
            ->setTo($this->email)
            ->setSubject('Запрошення на портал ІЛМ ' )
            ->send();
    }

}
