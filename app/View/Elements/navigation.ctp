<?php
$catsarray = '';
$activeMenu = '';
$activeItem = '';
$activeItemName = '';
$activeItem1 = '';
$activeItem2 = '';
$activeItem3 = '';
$activeItem4 = '';
$activeItem5 = '';
$activeItem6 = '';
$checkActiveCity = false;
$listCats = '';
$cats = $this->Mainmenu->getCategory();
$cities = $this->Mainmenu->getCities();

foreach ($cats as $cat) {
    if ($cat == null)
        continue;
    if ($cat['Objektarteninternet']['OBI_ID'] == 100) {
        $cat['Uebersetzungen']['UEB_TEXT'] = __('Villen mit Meerblick');
    }
    if ($cat['Objektarteninternet']['OBI_ID'] == 200) {
        $cat['Uebersetzungen']['UEB_TEXT'] = __('Villen an erster Meereslinie');
    }
    if ($cat['Objektarteninternet']['OBI_ID'] == 300) {
        $cat['Uebersetzungen']['UEB_TEXT'] = __('Palma de Mallorca und Altstadtpaläste');
    }
    if ($cat['Objektarteninternet']['OBI_ID'] == 400) {
        $cat['Uebersetzungen']['UEB_TEXT'] = __('Vermietungen');
    }

    if (
            isset($this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' && isset($this->params['action']) && $this->params['action'] == 'search' || $this->params['action'] == 'show'
    ) {
        if (
                isset($this->params['named']['c']) && !empty($this->params['named']['c']) && $this->params['named']['c'] == $cat['Objektarteninternet']['OBI_ID'] ||
                isset($this->params['named']['cat']) && !empty($this->params['named']['cat']) && $this->params['named']['cat'] == $cat['Objektarteninternet']['OBI_ID'] ||
                isset($this->params['cat']) && !empty($this->params['cat']) && $this->params['cat'] == $cat['Objektarteninternet']['OBI_ID'] ||
                isset($menuSel) && !empty($menuSel) && $menuSel['cat'] == $cat['Objektarteninternet']['OBI_ID']
        ) {
            $activeItem = 'selItem';
            $activeItemName = $cat['Uebersetzungen']['UEB_TEXT'];
            $catsarray = array('c' => $cat['Objektarteninternet']['OBI_ID']);
        } else {
            $activeItem = '';
            $activeItemName = '';
            $catsarray = array();
        }
    }
    $what = ($cat['Objektarteninternet']['OBI_ID'] == 400) ? Configure::read('seoWording.string.rent.' . CakeSession::read('Config.language')) : Configure::read('seoWording.string.buy.' . CakeSession::read('Config.language'));
    $slugtext = ($this->Session->read('Config.language') == 'deu' && $cat['Objektarteninternet']['OBI_ID'] == 3) ? __('Villen Landhäuser Fincas Mallorca') : $cat['Uebersetzungen']['UEB_TEXT'];
    $listCats .= '<li>' . $this->Html->link(
                    $cat['Uebersetzungen']['UEB_TEXT'], $this->Flags->changeUrl(
                            $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug($slugtext), $catsarray
                    ), array('class' => $activeItem, 'rel' => $cat['Objektarteninternet']['OBI_ID'])) . '</li>';
}
if (isset($this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' &&
        isset($this->params['action']) && ($this->params['action'] == 'search' || $this->params['action'] == 'show')
) {
    $activeMenu = 'cMenu';
} else {
    $activeMenu = '';
}
?>
<ul class="topnav">
    <li><?php echo $this->Html->link(__('Schnell-Suche'), '#'); ?>
        <ul class="innerul">
            <?php echo $listCats ?>
        </ul>
    </li>
    <li><?php echo $this->Html->link(__('Detail-Suche'), '#', array('class' => $activeMenu)); ?>
        <ul class="innerul">
            <li class="sub" id="detailCats"><a href="#" class="<?php echo __('Alle Objektarten'); ?>"><?php echo (!empty($activeItemName)) ? $activeItemName : __('Alle Objektarten'); ?></a>
                <ul>
                    <?php echo $listCats ?>
                </ul>
            </li>
            <li class="sub" id="detailCities"><a href="#" class="<?php echo __('Alle Orte'); ?>"><?php echo __('Alle Orte'); ?></a>
                <ul>
                    <div id="scrollbar1">
                        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                        <div class="viewport">
                            <div class="overview">
                                <?php
                                foreach ($cities as $city) {
                                    if ($city['Regionen']['REG_ID'] == 1)
                                        continue;

                                    if ($city[0]['BER_NAME'] == null) {
                                        if (
                                                isset($this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' && isset($this->params['action']) && $this->params['action'] == 'search' || $this->params['action'] == 'show'
                                        ) {
                                            if (
                                                    isset($this->params['named']['r']) && !empty($this->params['named']['r']) && $this->params['named']['r'] == $city['Regionen']['REG_ID'] ||
                                                    isset($menuSel) && !empty($menuSel) && $menuSel['cityR'] == $city['Regionen']['REG_ID']
                                            ) {
                                                $activeItem = 'selItem';
                                                $activeItemName = $city['Regionen']['REG_NAME'];
                                            } else {
                                                $activeItem = '';
                                                $activeItemName = '';
                                            }
                                        }
                                        echo '<li>' . $this->Html->link(
                                                $city['Regionen']['REG_NAME'], $this->Flags->changeUrl(
                                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug($city['Regionen']['REG_NAME'])
                                                        //array('r' => $city['Regionen']['REG_ID'])
                                                )
                                                , array('class' => $activeItem, 'rel' => 'r' . $city['Regionen']['REG_ID'])) . '</li>';
                                        $activeItem = '';
                                    }

                                    if ($city[0]['BER_NAME'])
                                        $last_reg_id = $city['Regionen']['REG_ID'];

                                    if (($city[0]['BER_NAME'] != null) && $city['Regionen']['REG_ID'] == $last_reg_id) {
                                        //echo '<li><a href="/gesamtobjekt/search/cityB:'.$city[0]['BER_ID'].'"> - '.$city[0]['BER_NAME'].'</a></li>';
                                        //echo '<li>'.$this->Html->Link($city[0]['BER_NAME'], array('controller' => 'gesamtobjekt', 'action' => 'search', 'cityB' => $city[0]['BER_ID'])).'</li>';
                                        if (isset($this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' && isset($this->params['action']) && $this->params['action'] == 'search') {
                                            if (isset(
                                                            $this->params['named']['b']) && !empty($this->params['named']['b']) && $this->params['named']['b'] == $city[0]['BER_ID'] ||
                                                    isset($menuSel) && !empty($menuSel) && $menuSel['cityB'] == $city[0]['BER_ID']
                                            ) {
                                                $activeItem = 'selItem';
                                                $activeItemName = $city[0]['BER_NAME'];
                                            } else {
                                                $activeItem = '';
                                                $activeItemName = '';
                                            }
                                        }
                                        echo '<li>' . $this->Html->link(
                                                $city[0]['BER_NAME'], $this->Flags->changeUrl(
                                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug($city[0]['BER_NAME'])
                                                        //array('b' => $city[0]['BER_ID'])
                                                )
                                                , array('class' => $activeItem, 'rel' => 'b' . $city[0]['BER_ID'])) . '</li>';
                                    } else {
                                        unset($last_reg_id);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li class="sub" id="detailPrices"><a href="#" class="<?php echo __('Alle Preise'); ?>"><?php echo __('Alle Preise'); ?></a>
                <?php
                if (isset(
                                $this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' && isset($this->params['action']) && $this->params['action'] == 'search' || $this->params['action'] == 'show'
                ) {
                    if (
                            isset($this->params['named']['p']) && !empty($this->params['named']['p']) ||
                            isset($menuSel) && !empty($menuSel)
                    ) {
                        if (isset($this->params['named']['p']) && $this->params['named']['p'] == 1 || isset($menuSel) && $menuSel['price'] == 1)
                            $activeItem1 = 'selItem';
                        if (isset($this->params['named']['p']) && $this->params['named']['p'] == 2 || isset($menuSel) && $menuSel['price'] == 2)
                            $activeItem2 = 'selItem';
                        if (isset($this->params['named']['p']) && $this->params['named']['p'] == 3 || isset($menuSel) && $menuSel['price'] == 3)
                            $activeItem3 = 'selItem';
                        if (isset($this->params['named']['p']) && $this->params['named']['p'] == 4 || isset($menuSel) && $menuSel['price'] == 4)
                            $activeItem4 = 'selItem';
                        if (isset($this->params['named']['p']) && $this->params['named']['p'] == 5 || isset($menuSel) && $menuSel['price'] == 5)
                            $activeItem5 = 'selItem';
                        if (isset($this->params['named']['p']) && $this->params['named']['p'] == 6 || isset($menuSel) && $menuSel['price'] == 6)
                            $activeItem6 = 'selItem';
                    }
                }
                ?>
                <ul>
                    <li><?php
                        echo $this->Html->Link(__('bis 1 Mio. €'), $this->Flags->changeUrl(
                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug(__('bis 1 Mio. €')), array('p' => 1)
                                ), array('class' => $activeItem1, 'rel' => 1));
                        ?></li>
                    <li><?php
                        echo $this->Html->Link(__('bis 2 Mio. €'), $this->Flags->changeUrl(
                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug(__('bis 2 Mio. €')), array('p' => 2)
                                ), array('class' => $activeItem2, 'rel' => 2));
                        ?></li>
                    <li><?php
                        echo $this->Html->Link(__('bis 3 Mio. €'), $this->Flags->changeUrl(
                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug(__('bis 3 Mio. €')), array('p' => 3)
                                ), array('class' => $activeItem3, 'rel' => 3))
                        ?></li>
                    <li><?php
                        echo $this->Html->Link(__('bis 4 Mio. €'), $this->Flags->changeUrl(
                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug(__('bis 4 Mio. €')), array('p' => 4)
                                ), array('class' => $activeItem4, 'rel' => 4));
                        ?></li>
                    <li><?php
                        echo $this->Html->Link(__('bis 5 Mio. €'), $this->Flags->changeUrl(
                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug(__('bis 5 Mio. €')), array('p' => 5)
                                ), array('class' => $activeItem5, 'rel' => 5));
                        ?></li>
                    <li><?php
                        echo $this->Html->Link(__('ab 5 Mio. €'), $this->Flags->changeUrl(
                                        $this->Session->read('Config.language'), array('controller' => 'gesamtobjekt', 'action' => 'search'), true, Inflector::slug(__('ab 5 Mio. €')), array('p' => 6)
                                ), array('class' => $activeItem6, 'rel' => '6'));
                        ?></li>
                </ul>
            </li>
            <li id="ref"><a href="#"><?php echo __('Referenz-Nr.'); ?></a>
                <?php
                if (isset($this->params['ref']) && !empty($this->params['ref'])) {
                    $ref = $this->params['ref'];
                } else {
                    $ref = "";
                }
                ?>
                <div><input name="suche" class="refsearch" type="text" value="<?php echo $ref ?>" rel="<?php echo Inflector::slug(__('Immobilien Suche nach Referenznummer')) ?>"/></div>
            </li>
            <li>
                <a href="#" >
                    <div class="button" rel="<?php echo Inflector::slug(__('Unser aktuelles Immobilien Angebot')) . '.html'; ?>"><?php echo __('Suche starten'); ?>&nbsp;</div>
                </a>
            </li>
            <li><a href="#" id='cancel'><?php echo __('abbrechen'); ?>&nbsp;</a></li>
        </ul>
    </li>
    <?php
    $cmenu = '';
    if ($this->params['controller'] == "content" && $this->params['action'] == "vip") {
        $cmenu = 'cMenu';
    }
    ?>
    <li style="">
        <?php echo $this->Html->link(__('VIP Special'), array('controller' => 'content', 'action' => 'vip', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('VIP Special'))), array('id' => 'vipLink', 'class' => $cmenu)); ?>
    </li>
</ul>