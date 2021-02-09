<?php

namespace medin\forms\manage\User;

use medin\entities\User\User;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class UserCreateForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;
    public $role;
    public $first_name;
    public $last_name;
    public $address;

    public function rules()
    {
        return [
            [['username', 'email', 'phone', 'role', 'first_name', 'last_name', 'address'], 'required'],
            ['email', 'email'],
            [['username', 'email', 'first_name', 'last_name', 'address'], 'string', 'max' => 255],
            [['username', 'email', 'phone'], 'unique', 'targetClass' => User::class],
            ['password', 'string', 'min' => 6],
            ['phone', 'integer'],
        ];
    }

    public function rolesList()
    {
        return ArrayHelper::map(\Yii::$app->authManager->getRoles(), 'name', 'description');
    }
}
