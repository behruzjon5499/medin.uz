<?php

namespace frontend\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 *
 * @property array $links
 */
class LanguagesWidget extends Widget
{

    private $languages;
    private $current_url;
    private $current_language;

    public function init()
    {
        $this->languages = Yii::$app->urlManager->languages;
        $this->current_url = mb_strcut(Url::current(), 4);
        $this->current_language = Yii::$app->language;
    }

    public function run()
    {
        return $this->render('languages_template', [
            'links' => $this->getLinks()
        ]);
    }

    private function getLinks()
    {
        foreach ($this->languages as $language) {
            $url = $language == $this->current_language ? "#" : rtrim("/$language/$this->current_url", '/');
            $class = $language != $this->current_language ? "" : "active-lan";
            $links[] = Html::a(strtoupper($language), $url, ['class' => $class]);
        }
        return isset($links) ? $links : null;
    }

}
