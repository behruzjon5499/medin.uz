<?php

namespace frontend\widgets;

use yii\jui\Widget;

class CanvasWidget extends Widget
{
    public function run()
    {
        return $this->render('canvas_template');
    }
}
