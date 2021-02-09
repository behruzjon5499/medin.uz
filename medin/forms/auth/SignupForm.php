<?php
namespace medin\forms\auth;

use himiklab\yii2\recaptcha\ReCaptchaValidator2;
use medin\entities\User\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $inn_number;
    public $organization_name;
    public $reCaptcha;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['first_name', 'required'],
            ['last_name', 'required'],
            ['address', 'required'],
            ['phone', 'required'],
            [['reCaptcha'], ReCaptchaValidator2::class,
                'secret' => '6LdIOdgUAAAAAK5vmi8Y8ZzHw0ZmnmR1gmZqK4nM', // unnecessary if reСaptcha is already configured
                'uncheckedMessage' => 'Please confirm that you are not a bot.'],
            ['username', 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
}
