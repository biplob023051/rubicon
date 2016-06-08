<?php
//debug($objects);
//debug($this->params);
if ($this->params['controller'] == 'bookmark' && !isset($objects)):
    ?>
    <div style="height: 54px;"></div>
    <div class="border_orange_thin"></div>
    <div class="clr"></div>
    <div class="searchresultrows emptybookmark" style="min-height: 517px;">
        <p><?php echo __('Derzeit liegen keine gespeicherten Immobilien vor.'); ?></p>
        <p><?php echo __('Haben Sie schon einen Login und vorher Immobilien auf die Merkliste gesetzt?'); ?></p>
        <p><?php echo __('Dann loggen Sie sich bitte ein.'); ?></p>
    </div>
    <?php
elseif ($this->params->controller == 'gesamtobjekt' && !count($objects)):
    ?>
    <div style="height: 54px;"></div>
    <div class="border_orange_thin"></div>
    <div class="searchresultrows"  style="min-height: 500px;">
        <p><?php echo __('Keine Ergebnisse gefunden, bitte verändern Sie Ihre Sucheinstellungen!'); ?></p>
    </div>
    <?php
else:
    ?>
    <div id="searchheader">
        <div id="foundresults" class="col-md-3 col-sm-3 col-xs-3">
            <?php if (!isset($this->params['models']['Bookmark'])): ?>
                <?php //__('Objekte'); ?><?php echo count($this->Session->read('objectSlider')); ?>
                <?php if (isset($headerinfos['mixedCats'])): ?>
                    <?php if (count($this->Session->read('objectSlider')) == 1) echo __('Immobilie gefunden'); ?><?php if (count($this->Session->read('objectSlider')) != 1) echo __('Immobilien gefunden'); ?>
                <?php else: ?>
                    <?php echo $headerinfos['searchCat']; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php echo __('Ihre Merkliste enthält'); ?> <?php echo count($this->Session->read('objectSlider')); ?> <?php if (count($this->Session->read('objectSlider')) == 1) echo __('Immobilie'); ?><?php if (count($this->Session->read('objectSlider')) != 1) echo __('Immobilien'); ?>
            <?php endif; ?>
        </div>
        <div id="resultsperpage" class="col-md-3 col-sm-3 col-xs-3">
            <?php
            //debug($this->params['named']);
            if ($this->Session->read('Config.language') != DEFAULT_LANGUAGE) {
                $arg1 = array();
                $arg2 = array();

                if (isset($this->params['catname'])) {
                    $action = $this->params['catname'];
                } elseif (isset($this->params['any'])) {
                    $action = $this->params['any'];
                } elseif (isset($this->params['slug'])) {
                    $action = $this->params['slug'];
                    if (isset($this->params['cat']))
                        $arg2['cat'] = $this->params['cat'];
                }

                $arg1 = array(
                    'controller' => $this->Session->read('Config.language'),
                    'action' => $action
                );

                if (!empty($this->params['named'])) {
                    if (isset($this->params['named']['c']))
                        $arg2['c'] = $this->params['named']['c'];
                    if (isset($this->params['named']['r']))
                        $arg2['r'] = $this->params['named']['r'];
                    if (isset($this->params['named']['p']))
                        $arg2['p'] = $this->params['named']['p'];
                    if (isset($this->params['named']['ref']))
                        $arg2['ref'] = $this->params['named']['ref'];
                    if (isset($this->params['named']['cat']))
                        $arg2['cat'] = $this->params['named']['cat'];
                }
                if (!empty($this->params['ref'])) {
                    $arg2['ref'] = $this->params['ref'];
                }

                if (count($arg2)) {
                    $args = array_merge($arg1, $arg2);
                } else {
                    $args = $arg1;
                }
                $this->Paginator->options(array(
                    'url' => $args
                ));
            }
            ?>
            <!--    --><?php //echo __('Objekte pro Seite');                       ?><!-- --><?php //echo $this->Html->image('dpdown.jpg');                      ?>
            <!--        <ul class="drop_down_list">-->
            <!--              <li>--><?php //echo $this->Paginator->link('5',array('limit' => '5'), $options = array('escape' => false));                      ?><!--</li>-->
            <!--              <li>--><?php //echo $this->Paginator->link('10',array('limit' => '10'), $options = array('escape' => false));                      ?><!--</li>-->
            <!--              <li>--><?php //echo $this->Paginator->link('15',array('limit' => '15'), $options = array('escape' => false));                      ?><!--</li>-->
            <!--         </ul>-->
        </div>
        <div id="pricesort" class="col-md-3 col-sm-3 col-xs-3"><?php echo __('Preis:'); ?>
            <?php
            $sortDir = ($this->Paginator->sortDir() == 'asc') ? $this->Paginator->sortDir() : 'desc';
            $text = ($sortDir == 'asc') ? __('aufsteigend') : __('absteigend');
            ?>
            <?php
            //debug($this->Paginator->sortDir());
            //debug($this->Paginator->sortKey());
            echo $this->Paginator->sort('OBJ_PREIS', $text, $options = array('escape' => false, 'direction' => 'desc', 'class' => 'asc'));
            ?>
        </div>
        <?php if (count($objects) && count($this->Session->read('objectSlider')) > $defaultMaxPerPage): ?>
            <div class="col-md-3 col-sm-3 col-xs-3 page_navigator">
                <div class="page_numbers">
                    <ul>
                        <?php echo $this->Paginator->prev($this->Html->image('arrow_left.png', array('border' => 0, 'tag' => 'li')), array('escape' => false, 'tag' => 'li')); ?>
                        <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li')); ?>
                        <?php echo $this->Paginator->next($this->Html->image('arrow_right.png', array('border' => 0, 'tag' => 'li')), array('escape' => false, 'tag' => 'li')); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="border_orange_thin"></div>
    <div class="clearfix"></div>

    <?php if (isset($objects) && count($objects) > 0): ?>
        <?php foreach ($objects as $key => $data): ?>
            <?php //debug($data['Gesamtobjekt']); ?>
            <div class="searchresultrows" id="row_<?php echo $data['Gesamtobjekt']['OBJ_ID'] ?>">
                <!--<a name="<?php // echo $data['Gesamtobjekt']['OBJ_ID']            ?>">-->
                <?php
                $alt = $data['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'] . ' - ' . $data['Gesamtobjekt']['REG_NAME'] . ' - ';
                $linkcity = ($data['Gesamtobjekt']['REG_ID'] > 1) ? $data['Gesamtobjekt']['REG_NAME'] : 'Mallorca';
                if ($data['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) {
                    $alt .= $data['Gesamtobjekt']['BER_NAME'] . ' - ';
                    $linkcity .= '_' . $data['Gesamtobjekt']['BER_NAME'];
                }
                $alt .= $data['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'];
                $to = (CakeSession::read('Config.language') != DEFAULT_LANGUAGE) ? '/' . CakeSession::read('Config.language') . '/' : '';
                //debug(Configure::read('seoWording.string.estates.'.CakeSession::read('Config.language')));
                ?>
                <div class="row clearfix">
                    <div class="col-md-7 col-sm-12">
                        <?php
                        //echo $this->Html->link($this->Html->image('/imagesrc/resize.php?src=' . $data['Gesamtobjekt']['OBJ_NUMMER'] . '-1.jpg&q=100&w=521&h=353', array('class' => 'img-responsive', 'alt' => $alt)), $this->Flags->changeUrl($this->Session->read('Config.language'), Inflector::slug($linkcity) . '_' . Inflector::slug($data['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' . $data['Gesamtobjekt']['OBJ_NUMMER'] . '.html', true), array('escape' => false));
                        echo $this->Html->link($this->Html->image('/imagesrc/' . $data['Gesamtobjekt']['OBJ_NUMMER'] . '-1.jpg', array('class' => 'img-responsive', 'alt' => $alt)), $this->Flags->changeUrl($this->Session->read('Config.language'), Inflector::slug($linkcity) . '_' . Inflector::slug($data['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' . $data['Gesamtobjekt']['OBJ_NUMMER'] . '.html', true), array('escape' => false));
                        ?>
                    </div>
                    <div class="col-md-5 col-sm-12 rightarea">
                        <div class="part1 clearfix">
                            <h4 class="orange">
                                <?php
                                echo $this->Html->link($data['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'], $this->Flags->changeUrl(
                                                $this->Session->read('Config.language'), Inflector::slug($linkcity) . '_' .
                                                Inflector::slug($data['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
                                                $data['Gesamtobjekt']['OBJ_NUMMER'] . '.html', true));
                                ?>
                            </h4>
                        </div>
                        <div class="part2 clearfix">
                            <?php $coords = $this->Coords->getGeo($data['Gesamtobjekt']['OBJ_ID']); ?>
                            <div class="info_rows">
                                <?php echo __('Mallorca'); ?>
                                <?php
                                if ($data['Gesamtobjekt']['REG_ID'] > 1)
                                    echo $data['Gesamtobjekt']['REG_NAME'];
                                if ($data['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1)
                                    echo ', ' . $data['Gesamtobjekt']['BER_NAME'];
                                ?>
                                <span style="float:right"><img src="/img/dot.png" class="map_icon" id="OBJ<?php echo $data['Gesamtobjekt']['OBJ_ID'] ?>lati<?php echo $coords['reg_latitude']; ?>long<?php echo $coords['reg_longitude']; ?>" rel="#googlemap" /></span>
                            </div>
                            <?php
                            if (is_array($data['Gesamtobjekt']['EIAS'])):
                                $rent = false;
                                $onlyrent = false;
                                foreach ($data['Gesamtobjekt']['EIAS'] as $k => $eia): //debug($eia);
                                    if ($k == 'PLOT' && $eia != '-')
                                        echo '<div class="info_rows"><span class="spec_title">' . __('Grundstück') . ': </span>' . $eia . ' m²</div>';
                                    if ($k == 'LIVING' && $eia != '-')
                                        echo '<div class="info_rows"><div class="spec_title">' . __('Wohnfläche') . ': </div>' . $eia . ' m²</div>';
                                    if ($k == 'YEAR' && $eia != '-')
                                        echo '<div class="info_rows"><div class="spec_title">' . __('Baujahr') . ': </div>' . $eia . '</div>';
                                    if ($k == 'ROOM' && $eia != '-')
                                        echo '<div class="info_rows"><div class="spec_title">' . __('Schlafzimmer') . ': </div>' . $eia . '</div>';
                                    if ($k == 'BATH' && $eia != '-')
                                        echo '<div class="info_rows"><div class="spec_title">' . __('Bäder') . ': </div>' . $eia . '</div>';
                                    if ($k == 'RENT' && $eia != '-')
                                        $rent = true;
                                    if ($k == 'ONLYRENT' && $eia != '-')
                                        $onlyrent = true;
                                    if ($k == 'ONLYRENTPrice' && $eia != '-')
                                        $onlyrentprice = $eia;
                                    ?>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                            <div class="info_rows"><div class="spec_title"><?php echo __('Ref'); ?>:  </div><?php echo $data['Gesamtobjekt']['OBJ_NUMMER'] ?></div>
                            <div class="info_rows<?php echo ($onlyrent) ? '_rent' : ''; ?>">
                                <div class="spec_title"><?php echo __('Kaufpreis'); ?>:</div><?php echo $data['Gesamtobjekt']['OBJ_PREIS'] ?><?php if (!empty($data['Gesamtobjekt']['OBJ_UET_PREISZUSATZ']) && $data['Gesamtobjekt']['OBJ_PREIS'] != 0): ?> | <?php echo $data['Gesamtobjekt']['OBJ_UET_PREISZUSATZ'] ?><?php endif; ?></div>

                            <?php if ($rent): ?>
                                <?php if ($onlyrent): ?>
                                    <div class="info_rows"><div class="spec_title"><?php echo __('Mietpreis'); ?>:</div>&#8364; <?php echo $onlyrentprice ?></div>
                                <?php else: ?>
                                    <!--                    <div class="info_rows--><?php //echo ($rent)?'_rent':'';        ?><!--"><div class="spec_title">--><?php //__('Mietpreis');                      ?><!--:</div>--><?php //__('Preis auf Anfrage');                      ?><!--</div>-->
                                    <div class="info_rows<?php echo ($rent) ? '_rent' : ''; ?>"><?php echo __('Objekt kann angemietet werden, Preis auf Anfrage'); ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="part3 clearfix">
                            <?php
                            $text = strip_tags($this->Menu->myTruncate($data['Gesamtobjekt']['OBJ_UET_WERBETEXT'], 135));
                            $laenge = strlen($text);
                            if ($laenge > 130) {
                                $text = strip_tags($this->Menu->myTruncate($data['Gesamtobjekt']['OBJ_UET_WERBETEXT'], 120));
                            }
                            ?>
                            <div class="info_col">
                                <?php echo $text ?>
                                <span class="more_details">
                                    <?php
                                    echo $this->Html->link(__('mehr Details'), $this->Flags->changeUrl(
                                                    $this->Session->read('Config.language'), Inflector::slug($linkcity) . '_' .
                                                    Inflector::slug($data['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
                                                    $data['Gesamtobjekt']['OBJ_NUMMER'] . '.html', true)
                                    );
                                    ?>
                                </span>
                            </div>
                        </div>
                        <!--<div class="clearfix" style="height: 20px;"></div>-->
                    </div>
                </div>
            </div>
            <div class="clr" style="height: 5px;"></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (count($objects) && count($this->Session->read('objectSlider')) > $defaultMaxPerPage): ?>
        <div class="border_orange"></div>
        <div class="page_navigator" style="padding: 15px 0 15px 0;">
            <div class="page_numbers">
                <ul>
                    <?php echo $this->Paginator->prev($this->Html->image('arrow_left.png', array('border' => 0, 'tag' => 'li')), array('escape' => false, 'tag' => 'li')); ?>
                    <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li')); ?>
                    <?php echo $this->Paginator->next($this->Html->image('arrow_right.png', array('border' => 0, 'tag' => 'li')), array('escape' => false, 'tag' => 'li')); ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <span style="font-size: 10px; float: right;"><?php //echo $this->Paginator->counter(array('format' => 'Seite %page% von %pages%, angezeigt werden %current% Ergebnisse von insgesamt %count%, beginnend bei %start%, endend bei %end%'));                    ?></span>
    <?php endif; ?>

<?php
endif;
?>
<?php echo $this->element('map'); ?>