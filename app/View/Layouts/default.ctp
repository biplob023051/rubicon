<!DOCTYPE html>
<html lang="<?php echo CakeSession::read('Config.language'); ?>">
    <head>
        <?php echo $this->Html->charset(); ?>
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo isset($metadesc) ? $metadesc : __('Immobilien auf Mallorca ✓ Finestproperties ist Ihr ★★★★★ Immobilienmakler auf Mallorca wenn es um exklusive Immobilien, Villas, Fincas und Apartments auf Mallorca geht'); ?>"/>
        <meta name="keywords" content="<?php echo isset($metakeys) ? $metakeys : __('Immobilien Mallorca, Immobilienmakler Mallorca, Immobilien Mallorca kaufen, Exklusive Mallorca Immobilien, Apartments Mallorca, Fincas Mallorca, Villas Mallorca'); ?>"/>
        <meta http-equiv="language" content="<?php echo strtoupper(Configure::read('lngFile.' . CakeSession::read('Config.languageID'))) ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=8"/>
        <meta http-equiv="expires" content="mon, 31 dec 2015 14:30:00 GMT"/>
        <meta last-modified="Thu, 11 Jun 2015 12:17:27 GMT"/>
        <meta name="robots" content="index,follow"/>

        <title><?php echo $title_for_layout; ?></title>

        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        // Stylesheets
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('jquery-ui-1.8.16.custom');
        if (isset($this->params) && $this->params['controller'] == 'gesamtobjekt' || $this->params['controller'] == 'content'):
            echo $this->Html->css('nivo-slider');
        endif;
        echo $this->Html->css('MyFontsWebfontsKit');
        echo $this->Html->css('styles');
        echo $this->Html->css('skin');
        echo $scripts_for_layout;
        echo $this->fetch('css');
        // Javascripts
        echo $this->Html->script('jquery-1.9.1.min');
        echo $this->Html->script('bootstrap.min');
//        echo $this->Html->script('jquery-1.6.2.min');
        echo $this->Html->script('scriptbreaker-multiple-accordion-1');
        echo $this->Html->script('jquery-ui-1.8.16.custom.min');
        if (isset($page) && $page == 'home'):
            echo $this->Html->script('cufon');
            echo $this->Html->script('Satisfaction_400.font');
        endif;
        if (isset($this->params) && $this->params['controller'] == 'gesamtobjekt' || $this->params['controller'] == 'content'):
            echo $this->Html->script('jquery.nivo.slider');
        endif;
//        echo $this->Html->script('jquery.tools.min');
        echo $this->Html->script('jquery.actions');
        echo $this->Html->script('jquery.tinyscrollbar.min');
        echo $this->Html->script('jquery.jcarousel.min');
        echo $this->Html->script('youtube');
        echo $this->fetch('scsript');
        if (isset($this->params) && $this->params['controller'] == 'gesamtobjekt' or $this->params['controller'] == 'bookmark' or $this->params['controller'] == 'contacts'):
            ?>
            <script type="text/javascript" src="<?php echo $this->GoogleMapV3->apiUrl() ?>"></script>
        <?php endif; ?>
    </head>
    <body class="<?php echo CakeSession::read('Config.language'); ?>">
        <?php // echo $this->params['controller'] . '/' . $this->params['action']; ?>
        <div class="header" id="mainHeader">
            <div class="navbar-header">
                <?php echo $this->Html->link($this->Html->Image('Immobilien-Mallorca-Finest-Properties-Mallorca.png', array('class' => 'logo img-responsive', 'alt' => __('Immobilienmakler Finest Properties'))), $this->Flags->changeUrl($this->Session->read('Config.language'), '/'), array('escape' => false)); ?>
            </div>
            <div class="visible-xs clearfix" id="menu-toggle-btn">
                <button type="button" class="navbar-toggle navbar-toggle-lft collapsed" onclick="toggleMenu('leftnav')">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#appnav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse top_nav" id="appnav">
                <ul class="no-mrgn clearfix">
                    <li><?php echo $this->Html->link(__('Start'), $this->Flags->changeUrl($this->Session->read('Config.language'), '/')); ?></li>
                    <!--<li><?php // echo $this->Html->link(__('Newsletter'), '#' . __('Newsletter'), array('class' => 'modalInput', 'id' => 'newsletterWindow', 'rel' => '#news', 'data-toggle'=> 'modal', 'data-target'=>'#news'));             ?></li>-->
                    <li><?php echo $this->Html->link(__('Newsletter'), '#' . __('Newsletter'), array('data-toggle' => 'modal', 'data-target' => '#news', 'data-backdrop' => 'static', 'data-keyboard' => 'false')); ?></li>
                    <li>
                        <a href="#" style="cursor: default;"><?php echo __('Über uns'); ?></a>
                        <ul>
                            <li><?php echo $this->Html->link(__('Sie möchten verkaufen?'), array('controller' => 'content', 'action' => 'sell', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Apartments Fincas Villen Kauf Verkauf Mallorca')))); ?></li>
                            <li><?php echo $this->Html->link(__('Unser Immobilienmakler Team'), array('controller' => 'content', 'action' => 'team', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Unser Immobilienmakler Mallorca Team')))); ?></li>
                            <?php if (CakeSession::read('Config.language') == 'deu'): ?>
                                <li><?php echo $this->Html->link(__('Unsere Empfehlung'), array('controller' => 'content', 'action' => 'immobiliencanarien', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Unsere Empfehlung')))); ?></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <!--            <li><a href="/content/links">--><?php //__('Partner-Links');                                                     ?><!--</a></li>-->
                    <!--            <li>--><?php //echo $this->Html->link(__('Kontakt'), $this->Flags->changeUrl($this->Session->read('Config.language'), array('controller' => 'contacts', 'action' => 'show', 'multiple' => 1), true, Inflector::slug(__('URLKontakt'))));                                              ?><!--</li>-->
                    <li><?php echo $this->Html->link(__('Kontakt'), array('controller' => 'contacts', 'action' => 'show', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Kontakt')))); ?></li>
                    <li class="headerphone"><?php echo __('Tel.'); ?>: +34 971 69 81 49</li>                    
                </ul>
            </div>            
            <ul class="social no-mrgn clearfix">
                <li><?php echo $this->Html->link($this->Html->image('facebook.png', array('alt' => __('Finest Propterties bei Facebook'))), 'http://www.facebook.com/pages/Finest-Properties-Mallorca/158269977569009', array('escape' => false, 'target' => '_blank', 'class' => 'social_icon')); ?></li>
                <li><?php echo $this->Html->link($this->Html->image('video.png', array('alt' => __('Finest Propterties bei YouTube'))), 'http://www.youtube.com/user/FinestProperties', array('escape' => false, 'target' => '_blank', 'class' => 'social_icon')); ?></li>
                <li><?php echo $this->Html->link($this->Html->image('googleplus.png', array('alt' => __('Finest Propterties bei Google+'))), 'https://plus.google.com/+Finestpropertiesmallorca', array('escape' => false, 'target' => '_blank', 'class' => 'social_icon')); ?></li>
            </ul>
            <div id="flags">
                <?php echo $this->element('flags'); //  ,array('cache'=>array('time'=>'+1 year','key'=>$this->Session->read('Config.languageID')))     ?>
            </div>
        </div>

        <div class="device clearfix" id="main-body">
            <div class="col-lg-2 col-md-2 col-sm-3" id="leftnav">
                <button type="button" class="close" onclick="toggleMenu('leftnav')"><img src="/img/close.png" alt="<?php echo __('Close'); ?>"/></button>
                <?php echo $this->element('navigation'); ?>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-9 no-pad-lft content-part">
                <?php if (isset($page) && $page == 'home'): ?>
                    <div id="banner">
                        <img class="img-responsive" src="/img/Mallorca-Immobilien-Finest-Properties.jpg" alt="<?php echo __('Immobilienmakler Finest Properties'); ?>"/>
                    </div>
                    <div class="border_orange"></div>
                <?php endif; ?>

                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('email'); ?>

                <div class="clearfix">
                    <?php echo $content_for_layout; ?>
                </div>

                <div class="footer">
                    <div class="social_icon">
                        <?php echo $this->Html->link($this->Html->image('facebook.png', array('alt' => __('Finest Propterties bei Facebook'))), 'http://www.facebook.com/pages/Finest-Properties-Mallorca/158269977569009', array('escape' => false)); ?>
                        <?php echo $this->Html->link($this->Html->image('video.png', array('alt' => __('Finest Propterties bei YouTube'))), 'http://www.youtube.com/user/FinestProperties', array('escape' => false)); ?>
                        <a href="https://plus.google.com/+Finestpropertiesmallorca" rel="publisher" style="text-decoration:none;">
                            <img src="/img/googleplus.png" alt="<?php echo __('Finest Propterties bei Google+'); ?>" style="border:0;width:24px;height:24px;"/>
                        </a>
                    </div>
                    <?php echo __('Tel'); ?>: +34 971 69 81 49 &nbsp;&nbsp;<?php echo $this->Html->link(__('Kontakt / Impressum'), array('controller' => 'contacts', 'action' => 'show', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLKontakt')))); ?><br />
                    <span id="small">&copy; <?php echo date('Y'); ?> <?php echo __('Alle Rechte bei Finest Properties Mallorca S.L.'); ?> <br /> <?php echo __('Wir sind spezialisiert auf die Vermarktung exklusiver Mallorca Immobilien. Ihr Partner für Immobilien auf Mallorca für Sie!'); ?></span>
                </div>
                <div title="where" class="<?php echo $this->params['controller'] ?>" id="<?php echo $this->params['action'] ?>" style="display: none; height: 1px; width: 1px;"></div>
            </div>
        </div>

        <?php echo $this->element('sql_dump'); ?>
        <!-- Google Code for Anfrage Conversion Page -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 1019908970;
            var google_conversion_language = "en";
            var google_conversion_format = "2";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "juO3CK7srAcQ6qaq5gM";
            var google_remarketing_only = false;
            /* ]]> */
        </script>
        <!-- ENDE Google Code for Anfrage Conversion Page -->
        <?php echo $this->element('news'); ?>
        <?php echo $this->element('rus'); ?>
    </body>
</html>