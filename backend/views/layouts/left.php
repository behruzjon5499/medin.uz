<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Adminstrator</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],

                    [
                        'label' => 'Products',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Products', 'icon' => 'file-code-o', 'url' => ['/products'],],
                            ['label' => 'Product_photos', 'icon' => 'dashboard', 'url' => ['/product-photos'],],
//                            ['label' => 'Catalogs', 'icon' => 'dashboard', 'url' => ['/catalogs'],],

                        ],
                    ],
                    [
                        'label' => 'Distributors',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Distrubutors', 'icon' => 'file-code-o', 'url' => ['/distributors'],],
                            ['label' => 'Links', 'icon' => 'dashboard', 'url' => ['/links'],],
                            ['label' => 'Distributors_And_Links', 'icon' => 'dashboard', 'url' => ['/distributors-and-links'],],

                        ],
                    ],

                    [
                        'label' => 'Site',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Menu', 'icon' => 'th-list', 'url' => ['/cms/menu']],
                            ['label' => 'Pages', 'icon' => 'font', 'url' => ['/cms/pages']],
                            ['label' => 'Article', 'icon' => 'dashboard', 'url' => ['/cms/articles']],
                            ['label' => 'Article categories', 'icon' => 'dashboard', 'url' => ['/cms/article-categories']],
                            ['label' => 'Feedback', 'icon' => 'envelope-o', 'url' => ['/feedback']],
                            ['label' => 'Contacts', 'icon' => 'dashboard', 'url' => ['/contacts']],
                            ['label' => 'Sliders', 'icon' => 'image', 'url' => ['/sliders']],
                            ['label' => 'Sliders photos', 'icon' => 'dashboard', 'url' => ['/slider-photos']],
                        ],
                    ],
                    ['label' => 'Users', 'icon' => 'dashboard', 'url' => ['/user']],
                    ['label' => 'Subscriptions', 'icon' => 'dashboard', 'url' => ['/subscriptions']],
                    ['label' => 'Orders', 'icon' => 'dashboard', 'url' => ['/orders']],
                    ['label' => 'Directions', 'icon' => 'dashboard', 'url' => ['/direction']],
                    ['label' => 'Tariffs', 'icon' => 'dashboard', 'url' => ['/tariffs']],
                    ['label' => 'Catalogs', 'icon' => 'dashboard', 'url' => ['/catalogs']],
                    ['label' => 'Library', 'icon' => 'dashboard', 'url' => ['/library']],
                    ['label' => 'Services', 'icon' => 'dashboard', 'url' => ['/services']],
                    ['label' => 'Login', 'url' => ['/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
