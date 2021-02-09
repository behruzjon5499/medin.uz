<?php

namespace medin\entities;

use Yii;

/**
 * This is the model class for table "distributors_and_links".
 *
 * @property int $distributor_id
 * @property int $link_id
 * @property string $url
 *
 * @property Distributors $distributor
 * @property Links $link
 */
class DistributorsAndLinks extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distributors_and_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['distributor_id', 'link_id', 'url'], 'required'],
            [['distributor_id', 'link_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['distributor_id', 'link_id'], 'unique', 'targetAttribute' => ['distributor_id', 'link_id']],
            [['distributor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distributors::class, 'targetAttribute' => ['distributor_id' => 'id']],
            [['link_id'], 'exist', 'skipOnError' => true, 'targetClass' => Links::class, 'targetAttribute' => ['link_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'distributor_id' => Yii::t('app', 'Distributor ID'),
            'link_id' => Yii::t('app', 'Link ID'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor()
    {
        return $this->hasOne(Distributors::class, ['id' => 'distributor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLink()
    {
        return $this->hasOne(Links::class, ['id' => 'link_id']);
    }
}
