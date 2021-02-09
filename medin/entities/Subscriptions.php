<?php

namespace medin\entities;

use medin\entities\User\User;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $user_id
 * @property string $tariff_id
 * @property string $start_time
 * @property mixed $user
 * @property ActiveQuery $tariff
 * @property string $end_time
 * @property int $status [int(11)]
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    private $date;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'tariff_id', 'start_time', 'end_time'], 'required'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['start_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['start_time'],
                ],
                'value' => function ($event) {
                    return strtotime($this->start_time);
                },
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['end_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['end_time'],
                ],
                'value' => function ($event) {
                    return strtotime($this->end_time);
                },
            ],
            TimeStampBehavior::class,
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'tariff_id' => Yii::t('app', 'Tariff ID'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTariff()
    {
        return $this->hasOne(Tariffs::class, ['id' => 'tariff_id']);
    }

    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function getDistributor()
    {
        return ArrayHelper::map(User::find()->where(['id' => \Yii::$app->authManager->getUserIdsByRole('distributor')])->all(), 'id', 'username');
    }
}
