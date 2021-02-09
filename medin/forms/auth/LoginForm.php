<?php
namespace medin\forms\auth;

use medin\entities\User\User;
use yii\base\Model;

/**
 * Login form
 *
 * @property null|User $user
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }
}
