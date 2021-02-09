<?php

namespace frontend\widgets;

use yii\jui\Widget;

class ToolbarWidget extends Widget
{
    public function run()
    {
        return $this->render('toolbar_template');
    }
}
