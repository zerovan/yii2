<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use frontend\models\Users;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $user_phone;
    public $user_username;
    public $user_mail;
    public $admin_password;
    public $user_default_business;
    public $verify_code;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['verify_code','captcha'],
            ['user_phone','required'],
            ['user_phone', 'unique', 'targetClass' => '\common\models\User', 'messages' => 'This phone number has already been registered.'],

            ['user_username', 'trim'],
            ['user_username', 'required'],
//            ['user_username', 'unique', 'targetClass' => '\frontend\models\Users', 'messages' => 'This username has already been taken.'],
            ['user_username', 'string', 'min' => 2, 'max' => 255],

            ['user_mail', 'trim'],
            ['user_mail', 'required'],
            ['user_mail', 'email'],
            ['user_mail', 'string', 'max' => 255],
            ['user_mail', 'unique', 'targetClass' => '\frontend\models\Users', 'messages' => 'This email address has already been taken.'],

            ['admin_password', 'required'],
            ['admin_password', 'string', 'min' => 6],

            [['user_default_business'], 'exist', 'skipOnError' => true, 'targetClass' => Business::class, 'targetAttribute' => ['user_default_business' => 'business_id']],
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

        $user->user_username = $this->user_username;
        $user->user_mail = $this->user_mail;
        $user->user_default_business=$this->user_default_business;
        $user->setPassword($this->admin_password);
        $user->generateAuthKey();
        $user->user_phone=$this->user_phone;
        $user->national_code=time();
        $user->user_status="10";

//        $x = $user->save();
//        print_r($x);



        if($user->save()){
            echo 'saved';
//            exit;

        }else{
            print_r($user->errors);
           exit;
        }
//        die('here');
         //$user->save() ? $user : null;
         // $user->save();
         // print "<pre>";
         // $user_def = User::findByUsername($user->user_username);



             return $user;


    }
}
