<?php

namespace medin\entities;

use medin\entities\User\User;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property int $catalog_id
 * @property string $main_photo
 * @property int $price
 * @property int $old_price
 * @property int $sale_status
 * @property string $user_id
 * @property int $sale_endtime
 * @property string $sale_description
 * @property string $description_ru
 * @property string $description_uz
 * @property string $description_en
 * @property int $status
 * @property int $view
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ProductPhotos[] $productPhotos
 * @property Catalogs $catalog
 */
class Products extends \yii\db\ActiveRecord
{
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_SALE_WAIT = 0;
    const STATUS_SALE_ACTIVE = 10;
    public $date;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'catalog_id', 'price', 'old_price', 'description_ru', 'description_uz', 'description_en'], 'required'],
            [['user_id', 'catalog_id', 'price', 'old_price', 'sale_status', 'sale_endtime', 'status', 'view', 'created_at', 'updated_at'], 'integer'],
            [['sale_description', 'description_ru', 'description_uz', 'description_en'], 'string'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalogs::class, 'targetAttribute' => ['catalog_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['main_photo', 'image', 'extensions' => 'jpeg, png, jpg, gif', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => true],
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
            'catalog_id' => Yii::t('app', 'Catalog ID'),
            'main_photo' => Yii::t('app', 'Main Photo'),
            'price' => Yii::t('app', 'Price'),
            'user_id' => Yii::t('app', 'User ID'),
            'old_price' => Yii::t('app', 'Old Price'),
            'sale_status' => Yii::t('app', 'Sale Status'),
            'sale_endtime' => Yii::t('app', 'Sale Endtime'),
            'sale_description' => Yii::t('app', 'Sale Description'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_en' => Yii::t('app', 'Description En'),
            'status' => Yii::t('app', 'Status'),
            'view' => Yii::t('app', 'View'),
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
                'attribute' => 'main_photo',
                'createThumbsOnRequest' => true,
                'filePath' => '@storageRoot/store/product/[[attribute_id]]/[[filename]].[[extension]]',
                'fileUrl' => '@storageHostInfo/store/product/[[attribute_id]]/[[filename]].[[extension]]',
                'thumbPath' => '@storageRoot/cache/product/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbUrl' => '@storageHostInfo/cache/product/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
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

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->main_photo = UploadedFile::getInstance($this, 'main_photo');
            return true;
        }
        return false;
    }

    /**
     * @return ActiveQuery
     */
    public function getProductPhotos()
    {
        return $this->hasMany(ProductPhotos::class, ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalogs::class, ['id' => 'catalog_id']);
    }
    public function getDistributor()
    {
        return ArrayHelper::map(User::find()->where(['id' => \Yii::$app->authManager->getUserIdsByRole('distributor')])->all(), 'id', 'username');
    }
    /**
     * @return ActiveQuery
     */
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

    public function isSalewait()
    {
        return $this->sale_status === self::STATUS_SALE_WAIT;
    }

    public function isSaleactive()
    {
        return $this->sale_status === self::STATUS_SALE_ACTIVE;
    }
}
