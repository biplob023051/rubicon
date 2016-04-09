<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <meta name="viewport" content="width=1200; user-scalable=1" />
        <meta name="description" content="<?php
        if (isset($metadesc)) {
            echo $metadesc;
        } else {
            echo __('Immobilien auf Mallorca ✓ Finestproperties ist Ihr ★★★★★ Immobilienmakler auf Mallorca wenn es um exklusive Immobilien, Villas, Fincas und Apartments auf Mallorca geht');
        }
        ?>" />
        <meta name="keywords"    content="<?php
        if (isset($metakeys)) {
            echo $metakeys;
        } else {
            echo __('Immobilien Mallorca, Immobilienmakler Mallorca, Immobilien Mallorca kaufen, Exklusive Mallorca Immobilien, Apartments Mallorca, Fincas Mallorca, Villas Mallorca');
        }
        ?>" />
        <meta http-equiv="language" content="<?= strtoupper(Configure::read('lngFile.' . CakeSession::read('Config.languageID'))) ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta http-equiv="expires" content="mon, 31 dec 2015 14:30:00 GMT">
            <meta last-modified="Thu, 11 Jun 2015 12:17:27 GMT" />
            <meta name="robots" content="index,follow" />
            <?php
            echo $this->Html->css('jquery-ui-1.8.16.custom');
            if (isset($this->params) && $this->params['controller'] == 'gesamtobjekt' || $this->params['controller'] == 'content')
                echo $this->Html->css('nivo-slider');
            echo $this->Html->css('MyFontsWebfontsKit');
            echo $this->Html->css('styles');
            echo $this->Html->css('skin');
            echo $scripts_for_layout;
            ?>
            <?php echo $this->Html->meta('icon'); ?>
            <script type="text/javascript" src="/js/jquery-1.6.2.min.js"></script>
            <script type="text/javascript" src="/js/scriptbreaker-multiple-accordion-1.js"></script>
            <script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
            <?php if (isset($page) && $page == 'home'): ?>
                <script type="text/javascript" src="/js/cufon.js"></script>
                <script type="text/javascript" src="/js/Satisfaction_400.font.js"></script>
            <?php endif; ?>
            <?php if (isset($this->params) && $this->params['controller'] == 'gesamtobjekt' || $this->params['controller'] == 'content'): ?>
                <script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>
            <?php endif; ?>
            <script type="text/javascript" src="/js/jquery.tools.min.js"></script>
            <script type="text/javascript" src="/js/jquery.actions.js"></script>
            <script type="text/javascript" src="/js/jquery.tinyscrollbar.min.js"></script>
            <script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
            <script type="text/javascript" src="/js/youtube.js"></script>
            <?php if (isset($this->params) && $this->params['controller'] == 'gesamtobjekt' or $this->params['controller'] == 'bookmark' or $this->params['controller'] == 'contacts'): ?>
                <script type="text/javascript" src="<?= $this->GoogleMapV3->apiUrl() ?>"></script>
            <?php endif; ?>
    </head>
    <body class="<?= CakeSession::read('Config.language'); ?>">
        <div class="header" id="mainHeader">
            <?=
            $this->Html->link(
                    $this->Html->Image('Immobilien-Mallorca-Finest-Properties-Mallorca.png', array('class' => 'logo', 'alt' => __('Immobilienmakler Finest Properties'))), $this->Flags->changeUrl($this->Session->read('Config.language'), '/'), array('escape' => false)
            );
            ?>
            <div class="top_nav">
                <ul>
                    <li><?= $this->Html->link(__('Start'), $this->Flags->changeUrl($this->Session->read('Config.language'), '/')); ?></li>
                    <li><?= $this->Html->link(__('Newsletter'), '#' . __('Newsletter'), array('class' => 'modalInput', 'id' => 'newsletterWindow', 'rel' => '#news')); ?></li>
                    <li>
                        <a href="#" style="cursor: default;"><?php echo __('Über uns'); ?></a>
                        <ul>
                            <li><?= $this->Html->link(__('Sie möchten verkaufen?'), array('controller' => 'content', 'action' => 'sell', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Apartments Fincas Villen Kauf Verkauf Mallorca')))); ?></li>
                            <li><?= $this->Html->link(__('Unser Immobilienmakler Team'), array('controller' => 'content', 'action' => 'team', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Unser Immobilienmakler Mallorca Team')))); ?></li>
                            <?php if (CakeSession::read('Config.language') == 'deu'): ?><li><?= $this->Html->link(__('Unsere Empfehlung'), array('controller' => 'content', 'action' => 'immobiliencanarien', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Unsere Empfehlung')))); ?></li><?php endif; ?>
                        </ul>
                    </li>
                    <!--            <li><a href="/content/links">--><?php //__('Partner-Links');       ?><!--</a></li>-->
                    <!--            <li>--><?php //echo $this->Html->link(__('Kontakt'), $this->Flags->changeUrl($this->Session->read('Config.language'), array('controller' => 'contacts', 'action' => 'show', 'multiple' => 1), true, Inflector::slug(__('URLKontakt'))));?><!--</li>-->
                    <li><?= $this->Html->link(__('Kontakt'), array('controller' => 'contacts', 'action' => 'show', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Kontakt')))); ?></li>
                    <li><?= $this->Html->link($this->Html->image('facebook.png', array('alt' => __('Finest Propterties bei Facebook'))), 'http://www.facebook.com/pages/Finest-Properties-Mallorca/158269977569009', array('escape' => false, 'target' => '_blank', 'class' => 'social_icon')); ?></li>
                    <li><?= $this->Html->link($this->Html->image('video.png', array('alt' => __('Finest Propterties bei YouTube'))), 'http://www.youtube.com/user/FinestProperties', array('escape' => false, 'target' => '_blank', 'class' => 'social_icon')); ?></li>
                    <li><?= $this->Html->link($this->Html->image('googleplus.png', array('alt' => __('Finest Propterties bei Google+'))), 'https://plus.google.com/+Finestpropertiesmallorca', array('escape' => false, 'target' => '_blank', 'class' => 'social_icon')); ?></li>
                    <li class="headerphone"><?php echo __('Tel.'); ?>: +34 971 69 81 49</li>
                </ul>
                <div id="flags">
                    <?= $this->element('flags'); //  ,array('cache'=>array('time'=>'+1 year','key'=>$this->Session->read('Config.languageID')))   ?>
                </div>
            </div>
        </div>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="left_content"><?= $this->element('navigation'); // ,array('cache'=>array('time'=>'+1 year','key'=>$this->Session->read('Config.languageID')))       ?></td>
                <td class="container">
                    <?php if (isset($page) && $page == 'home'): ?>
                        <div id="banner"><img src="/img/Mallorca-Immobilien-Finest-Properties.jpg" alt="<?php echo __('Immobilienmakler Finest Properties'); ?>" /></div>
                        <div class="border_orange"/>
                        <div class="clr"/>
                    <?php endif; ?>
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('email'); ?>
                    <?php echo $content_for_layout; ?>
                    <div class="footer">
                        <div class="social_icon">
                            <?= $this->Html->link($this->Html->image('facebook.png', array('alt' => __('Finest Propterties bei Facebook'))), 'http://www.facebook.com/pages/Finest-Properties-Mallorca/158269977569009', array('escape' => false)); ?>
                            <?= $this->Html->link($this->Html->image('video.png', array('alt' => __('Finest Propterties bei YouTube'))), 'http://www.youtube.com/user/FinestProperties', array('escape' => false)); ?>
                            <a href="https://plus.google.com/+Finestpropertiesmallorca" rel="publisher" style="text-decoration:none;">
                                <img src="/img/googleplus.png" alt="<?php echo __('Finest Propterties bei Google+'); ?>" style="border:0;width:24px;height:24px;"/></a>
                        </div>
                        <?php echo __('Tel'); ?>: +34 971 69 81 49 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $this->Html->link(__('Kontakt / Impressum'), array('controller' => 'contacts', 'action' => 'show', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLKontakt')))); ?><br />
                        <span id="small">&copy; <?= date('Y'); ?> <?php echo __('Alle Rechte bei Finest Properties Mallorca S.L.'); ?> <br /> <?php echo __('Wir sind spezialisiert auf die Vermarktung exklusiver Mallorca Immobilien. Ihr Partner für Immobilien auf Mallorca für Sie!'); ?></span>
                    </div>
                    <div title="where" class="<?= $this->params['controller'] ?>" id="<?= $this->params['action'] ?>" style="display: none; height: 1px; width: 1px;"></div>
                    <div class="clr"/>

                    <?php echo $this->element('sql_dump'); ?>
                </td>
            </tr>
        </table>
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
        <?= $this->element('news'); ?>
        <?= $this->element('rus'); ?>
    </body>
</html>