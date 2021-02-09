<?php

namespace medin\entities;

use medin\entities\User\User;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * This is the model class for table "distributors".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $phone
 * @property string $address
 * @property string $photo
 * @property string $poster
 * @property integer $user_id
 * @property string site
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property int $created_at
 * @property int $updated_at
 *
 * @property DistributorsAndLinks[] $distributorsAndLinks
 * @property Links[] $links
 * @property Products[] $products
 * @property Tariffs[] $tariffs
 */
class Distributors extends \yii\db\ActiveRecord
{
    const SEASON_ACTIVE = 1;
    public $date;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distributors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'user_id'], 'required'],
            [['description_ru', 'description_uz', 'description_en'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'address', 'phone', 'site'], 'string', 'max' => 255],
            ['photo', 'image', 'extensions' => 'jpeg, png, jpg, gif', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => true],
            ['poster', 'image', 'extensions' => 'jpeg, png, jpg, gif', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => true],
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
            'address' => Yii::t('app', 'Address'),
            'site' => Yii::t('app', 'Site'),
            'photo' => Yii::t('app', 'Photo'),
            'poster' => Yii::t('app', 'Poster'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_en' => Yii::t('app', 'Description En'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'photo',
                'createThumbsOnRequest' => true,
                'filePath' => '@storageRoot/store/distributors/photo/[[attribute_id]]/[[filename]].[[extension]]',
                'fileUrl' => '@storageHostInfo/store/distributors/photo/[[attribute_id]]/[[filename]].[[extension]]',
                'thumbPath' => '@storageRoot/cache/distributors/photo/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbUrl' => '@storageHostInfo/cache/distributors/photo/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbs' => [
                    's16' => ['width' => 16, 'height' => 16],
                    's32' => ['width' => 32, 'height' => 32],
                    's48' => ['width' => 48, 'height' => 48],
                    's128' => ['width' => 128, 'height' => 128],
                    's160' => ['width' => 160, 'height' => 160],
                ],
            ],
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'poster',
                'createThumbsOnRequest' => true,
                'filePath' => '@storageRoot/store/distributors/poster/[[attribute_id]]/[[filename]].[[extension]]',
                'fileUrl' => '@storageHostInfo/store/distributors/poster/[[attribute_id]]/[[filename]].[[extension]]',
                'thumbPath' => '@storageRoot/cache/distributors/poster/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbUrl' => '@storageHostInfo/cache/distributors/poster/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbs' => [
                    's16' => ['width' => 16, 'height' => 16],
                    's32' => ['width' => 32, 'height' => 32],
                    's48' => ['width' => 48, 'height' => 48],
                    's128' => ['width' => 128, 'height' => 128],
                    's160' => ['width' => 160, 'height' => 160],
                ],
            ],
        ];
    }

//    public function beforeValidate()
//    {
//        if (parent::beforeValidate()) {
//            $this->photo = UploadedFile::getInstance($this, 'photo');
//            $this->poster = UploadedFile::getInstance($this, 'poster');
//            return true;
//        }
//        return false;
//    }

    /**
     * @return ActiveQuery
     */
    public function getDistributorsAndLinks()
    {
        return $this->hasMany(DistributorsAndLinks::class, ['distributor_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getLinks()
    {
        return $this->hasMany(Links::class, ['id' => 'link_id'])->viaTable('distributors_and_links', ['distributor_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['distributor_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTariffs()
    {
        return $this->hasMany(Tariffs::class, ['distributor_id' => 'id']);
    }

    public function getDistributor()
    {
        return ArrayHelper::map(User::find()->where(['id' => \Yii::$app->authManager->getUserIdsByRole('distributor')])->all(), 'id', 'username');
    }
}
