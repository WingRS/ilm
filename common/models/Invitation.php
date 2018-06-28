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
            [['created_at', 'used_at'], 'integer'],
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
            $this->created_at = time();
            $this->is_active = true;
        }
        if(User::findByEmail($this->email) != null) {
            Yii::$app->session->setFlash("error","Такий користувач вже існує. Запрошувати можна тільки користувачів котрі ще не зареєструвались.");
            return false;
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
        Yii::$app->session->setFlash("success","Користувача успішно запрошено на портал.");
    }


    public static function getByInvite($invite) {
        return self::findOne(["invite_string"=>$invite, "is_active"=> true]);
    }

}
