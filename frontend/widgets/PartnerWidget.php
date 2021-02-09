<?php

namespace frontend\widgets;

use yii\jui\Widget;

class PartnerWidget extends Widget
{
    public function run()
    {
        return $this->render('partner_template');
    }
}
