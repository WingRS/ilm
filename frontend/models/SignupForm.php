<?php
namespace frontend\models;

use phpDocumentor\Reflection\Types\Integer;
use yii\base\Model;
use common\models\User;
use yii\db\Exception;
use yii\web\UploadedFile;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $name;
    public $surname;
    public $company;
    public $chair;
    public $facebook;
    public $linkedin;
    public $ilm_program;
    public $ilm_year;
    public $password;
    public $city;
    public $phone;
    public $avatar;
    public $bio;
    /**
     * @var UploadedFile
     */
    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already been registered.'],
            ['email', 'string', 'min' => 2, 'max' => 255],
//
//            ['username', 'trim'],
//            ['username', 'required'],
//            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already been registered.'],
//            ['username', 'string', 'min' => 2, 'max' => 255],
////
//
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'min' => 2, 'max' => 255],

//            ['avatar', 'trim'],
//            ['avatar', 'required'],
//            ['avatar', 'string', 'min' => 2, 'max' => 255],
//
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
//
            ['surname', 'trim'],
            ['surname', 'required'],
            ['surname', 'string', 'min' => 2, 'max' => 255],
//
            ['chair', 'trim'],
            ['chair', 'required'],
            ['chair', 'string', 'min' => 2, 'max' => 255],

            ['company', 'trim'],
            ['company', 'required'],
            ['company', 'string', 'min' => 2, 'max' => 255],
//
            ['city', 'trim'],
            ['city', 'required'],
            ['city', 'string', 'min' => 2, 'max' => 255],
//
            ['facebook', 'trim'],
            ['facebook', 'string', 'min' => 2, 'max' => 255],
//
            ['linkedin', 'trim'],
            ['linkedin', 'string', 'min' => 2, 'max' => 255],
//
            ['ilm_program', 'trim'],
            ['ilm_program', 'string', 'min' => 2, 'max' => 255],
//
//            ['ilm_year', 'trim'],
//            ['ilm_year', 'integer', 'min' => 1, 'max' => 255],
//
            ['bio', 'trim'],
            ['bio', 'string', 'min' => 2, 'max' => 255],


            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        $user = new User();
        $user->username = $this->name."@".$this->surname;
        $user->email = $this->email;
        $user->name=  $this->name;
        $user->surname = $this->surname;
        $user->city = $this->city;
        $user->chair = $this->chair;
        $user->company = $this->company;
        $user->facebook = $this->facebook;
        $user->linkedin = $this->linkedin;
        $user->ilm_program= $this->ilm_program;
        $user->ilm_year = intval($this->ilm_year);
        $user->avatar = $this->avatar;
        $user->phone = $this->phone;
        $user->bio = $this->bio;
        $user->created_at = time();
        $user->updated_at = time();
        $user->status = $user::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save(false) ? $user : null;
    }



    public function upload()
    {
        if ($this->validate()) {

            $this->imageFile->saveAs(\Yii::getAlias("@webroot").'/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

            $this->avatar = "uploads/". $this->imageFile->baseName . '.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }
}
