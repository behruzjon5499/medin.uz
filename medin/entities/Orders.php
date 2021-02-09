<?php

namespace medin\entities;

use medin\entities\User\User;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $phone
 * @property string $clinic_inn
 * @property int $created_at
 * @property int $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_ARCHIVE = 20;
    public $date;
    /**
     * @var int|string
     */


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'clinic_inn'], 'required'],
            [['title_ru', 'title_uz', 'title_en', 'phone'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date'],
                ],
                'value' => function ($event) {
                    return strtotime($this->date);
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
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_en' => Yii::t('app', 'Title En'),
            'phone' => Yii::t('app', 'Phone'),
            'clinic_inn' => Yii::t('app', 'Clinic Inn'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function orderstatus($id)
    {
        $model = Orders::find()->where(['id' => $id])->andWhere(['status' => self::STATUS_ACTIVE])->one();
        $date = date("Y-m-d", $model->updated_at);
        $date1 = date("Y-m-d", time());
        $date = date_create("$date");
        date_add($date, date_interval_create_from_date_string("30 days"));
        if ($date1 < $date) {
            $model->status = self::STATUS_ARCHIVE;
            $model->save();
            return $model;
        } else {
            return $model;
        }
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isArchive()
    {
        return $this->status === self::STATUS_ARCHIVE;
    }
}
