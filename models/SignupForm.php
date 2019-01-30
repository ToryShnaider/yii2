<?php
/**
 * Created by PhpStorm.
 * User: Виктория
 * Date: 16.01.2019
 * Time: 15:34
 */

namespace app\models;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            ['username','trim'],
            ['username','required'],
            ['username', 'unique','targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username','string','min' => 2,'max' => 255],
            ['email','trim'],
            ['email','required'],
            ['email','email'],
            ['email', 'unique','targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['email','string','max' => 255],
            ['password','required'],
            ['password','string','min' => 6],
            ['role','required'],

        ];
    }

    public function signup()
    {
       if (!$this->validate()){
           return null;
       }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->role = $this->role;
        return $user->save()? $user : null;
    }

}