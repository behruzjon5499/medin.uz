<?php

namespace medin\entities;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string $title
 * @property string $icon
 *
 * @property DistributorsAndLinks[] $distributorsAndLinks
 * @property Distributors[] $distributors
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'icon'], 'required'],
            [['title', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributorsAndLinks()
    {
        return $this->hasMany(DistributorsAndLinks::class, ['link_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributors()
    {
        return $this->hasMany(Distributors::class, ['id' => 'distributor_id'])->viaTable('distributors_and_links', ['link_id' => 'id']);
    }
}
