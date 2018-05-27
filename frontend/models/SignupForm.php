<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

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
    public $bio;


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
//
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
        if (!$this->validate()) {
            return null;
        }

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
        $user->setPassword($this->password);
        $user->generateAuthKey();


//        $user = new User();
//        $user->username = $this->email."huy";
//        $user->email = $this->email;
//        $user->name = $this->name;
//        $user->surname = $this->name;
//        $user->bio = $this->bio;
//        $user->ilm_program= $this->name;
//        $user->ilm_year = $this->name;
//        $user->chair= $this->name;
//        $user->company = $this->name;
//        $user->linkedin = $this->name;
//        $user->facebook = $this->name;
//        $user->city = $this->city;
//        $user->phone = $this->phone;
//        $user->created_at = time();
//        $user->updated_at = time();
//        $user->setPassword($this->password);
//        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

//    public function load($data, $formName = null)
//    {
//        $this->setAttributes($data);
//        return true;
//    }


}
