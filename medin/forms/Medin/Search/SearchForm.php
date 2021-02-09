<?php
namespace medin\forms\Medin\Search;

use medin\entities\Shop\Brand;
use medin\entities\Catalogs;
use medin\forms\CompositeForm;
use medin\forms\Medin\Search\ValueForm;
use yii\helpers\ArrayHelper;
/**
 * @property ValueForm[] $values
 */
class SearchForm extends CompositeForm
{
    public $text;
    public $category;
    public $brand;
    public function __construct(array $config = [])
    {
        $this->values = array_map(function (Characteristic $characteristic) {
            return new ValueForm($characteristic);
        }, Characteristic::find()->orderBy('sort')->all());
        parent::__construct($config);
    }
    public function rules(): array
    {
        return [
            [['text'], 'string'],
            [['catalogs'], 'integer'],
        ];
    }
    public function categoriesList(): array
    {
        return ArrayHelper::map(Catalogs::find()->andWhere(['>', 'depth', 0])->orderBy('lft')->asArray()->all(), 'id', function (array $category) {
            return ($category['depth'] > 1 ? str_repeat('-- ', $category['depth'] - 1) . ' ' : '') . $category['name'];
        });
    }
    public function formName(): string
    {
        return '';
    }
    protected function internalForms(): array
    {
        return ['values'];
    }
}