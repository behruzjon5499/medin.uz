<?php

namespace medin\entities;

use himiklab\yii2\recaptcha\ReCaptchaValidator2;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property string $email
 * @property string $organization_name
 * @property string $vendor_name
 * @property string $factory_number
 * @property int $status
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 */
class Services extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    public $reCaptcha;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'email', 'organization_name', 'experience', 'description_ru'], 'required'],
            [['status'], 'integer'],
            [['reCaptcha'], ReCaptchaValidator2::class,
                'secret' => '6LdIOdgUAAAAAK5vmi8Y8ZzHw0ZmnmR1gmZqK4nM', // unnecessary if reСaptcha is already configured
                'uncheckedMessage' => 'Please confirm that you are not a bot.', 'on' =>self::SCENARIO_CREATE],
            [['description_ru'], 'string'],
            [['username', 'phone', 'email', 'organization_name', 'experience', ], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'organization_name' => Yii::t('app', 'Organization Name'),
            'experience' => Yii::t('app', 'Experience'),
            'status' => Yii::t('app', 'Status'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_en' => Yii::t('app', 'Description En'),
        ];
    }
    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}
