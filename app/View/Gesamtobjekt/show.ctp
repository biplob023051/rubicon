<?php $this->set('title_for_layout', __('Mallorca') . ' - ' . $objects[0]['Gesamtobjekt']['REG_NAME'] . ' - ' . $objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'] . ' - ' . $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT']); ?>
<?php $this->set('metadesc', $this->Text->truncate($this->Text->stripLinks($objects[0]['Gesamtobjekt']['OBJ_UET_WERBETEXT'])), 160, array('exact' => false)); ?>
<?php $this->set('metakeys', $this->Text->toList($this->Propertylinks->getSubstantives($objects[0]['Gesamtobjekt']['OBJ_UET_WERBETEXT'], 10), __('und'))); ?>


<?php //debug($objects); exit; ?>
<?php if (isset($images) && count($images)): ?>
    <div id="ribbon">
        <span>
            <!--<a href="#" class="modalInput" rel="#contact"></a>-->
            <a data-keyboard="false" data-backdrop="static" data-target="#contact" data-toggle="modal" href="#"><?php echo __('Anfrage per E-Mail'); ?></a>
        </span>
    </div>
    <div id="slider" class="nivoSlider">
        <?php foreach ($images as $img): ?>
            <?php
            $alt = $objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'] . ' - ' . $objects[0]['Gesamtobjekt']['REG_NAME'] . ' - ';
            if ($objects[0]['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) {
                $alt .= $objects[0]['Gesamtobjekt']['BER_NAME'] . ' - ';
            }
            $alt .= $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'];
            ?>
                                                                                        <!--<img class="img-responsive" src="/imagesrc/resize.php?src=<?php //echo $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] . $img;                    ?>.jpg&q=100&w=948&h=631" alt="<?php //echo $alt;                    ?>"/>-->
            <img class="img-responsive" src="/imagesrc/<?php echo $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] . $img; ?>.jpg" alt="<?php echo $alt; ?>"/>
        <?php endforeach; ?>
    </div>
    <span id="textimagefotos"><?php echo __('Objektfotos:'); ?></span>
<?php endif; ?>

<div class="clr"></div>
<div class="border_orange"></div>
<div class="clr"></div>
<div class="content_box3" style="margin-top: 15px;">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-4" style="color: #FFFFFF;"><?php echo __('Ref'); ?>: <?php echo $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></div>
        <div class="col-md-6 col-sm-8 text-right">
            <?php
            // get info about next / prev property
            $np = $this->Propertylinks->getPropertyId($objects[0]['Gesamtobjekt']['OBJ_ID']);
            $to = (CakeSession::read('Config.language') != DEFAULT_LANGUAGE) ? CakeSession::read('Config.language') . '/' : '';
            if (isset($np) && is_array($np)) {
                if (!empty($np['prev'])) {
                    $linkcityprev = $np['prev']['REG_NAME'];
                    if ($linkcityprev == 'unbekannt')
                        $linkcityprev = 'Mallorca';
                    if ($linkcityprev == '')
                        $linkcityprev = 'Mallorca';
                }

                if (!empty($np['prev']) && $np['prev']['BER_EXPOSERELEVANT'] == 1) {
                    $linkcityprev .= '_' . $np['prev']['BER_NAME'];
                }

                if (!empty($np['next'])) {
                    $linkcitynext = $np['next']['REG_NAME'];
                    if ($linkcitynext == 'unbekannt')
                        $linkcitynext = 'Mallorca';
                    if ($linkcitynext == '')
                        $linkcitynext = 'Mallorca';
                }

                if (!empty($np['next']) && $np['next']['BER_EXPOSERELEVANT'] == 1) {
                    $linkcitynext .= '_' . $np['next']['BER_NAME'];
                }
            }
            ?>
            <?php if (count($np) && !empty($np['prev'])): ?>
                <?php
                echo
                $this->Html->link(__('Vorheriges Objekt'), '/' . $to . Inflector::slug($linkcityprev) . '_' .
                        Inflector::slug($objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
                        $np['prev']['OBJ_NUMMER'] . '.html', array('class' => 'xprev'));
                ?>
            <?php endif; ?>
            <?php if (count($np) && !empty($np['next'])): ?>
                &nbsp;|&nbsp;
                <?php
                echo
                $this->Html->link(__('Nächstes Objekt'), '/' . $to . Inflector::slug($linkcitynext) . '_' .
                        Inflector::slug($objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
                        $np['next']['OBJ_NUMMER'] . '.html', array('class' => 'xnext'));
                ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row form-group clearfix">
        <div class="col-md-5 col-sm-4" style="color: #FFFFFF;">
            <h1 style="font-size: 17px;"><?php echo $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT']; ?></h1>
            <?php echo preg_replace('%<br/>\s*%', '<br/><br/>', $objects[0]['Gesamtobjekt']['OBJ_UET_WERBETEXT']); ?>
        </div>
        <div class="col-md-7 col-sm-8" style="color: #FFFFFF;">
            <div class="row clearfix" style="margin-top: 70px;">
                <div class="col-md-7 col-sm-7 col-xs-7 form-group w_100_768" style="color: #FFFFFF;">
                    <table class="td-uline" width="100%">
                        <tr>
                            <td colspan="2">
                                <?php $coords = $this->Coords->getGeo($objects[0]['Gesamtobjekt']['OBJ_ID']); ?>
                                <?php echo __('Mallorca'); ?><?php if ($objects[0]['Gesamtobjekt']['REG_ID'] != 1) { ?>, <?php echo $objects[0]['Gesamtobjekt']['REG_NAME'] ?><?php if ($objects[0]['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) echo ', ' . $objects[0]['Gesamtobjekt']['BER_NAME']; ?><span style="float:right"><img src="/img/dot2.png" id="OBJ<?php echo $objects[0]['Gesamtobjekt']['OBJ_ID'] ?>lati<?php echo $coords['reg_latitude']; ?>long<?php echo $coords['reg_longitude']; ?>" class="map_icon"  rel="#googlemap"/></span><?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'] ?></td>
                        </tr>
                        <?php
                        if (is_array($objects[0]['Gesamtobjekt']['EIAS'])):
                            foreach ($objects[0]['Gesamtobjekt']['EIAS'] as $k => $eia): //debug($eia);
                                if ($k == 'PLOT' && $eia != '-')
                                    echo '<tr><td valign="top" width=""><span class="spec_title">' . __('Grundstück') . ': </span></td><td>' . $eia . ' m²</td></tr>';
                                if ($k == 'LIVING' && $eia != '-')
                                    echo '<tr><td valign="top"><span class="spec_title">' . __('Wohnfläche') . ': </span></td><td>' . $eia . ' m²</td></tr>';
                                if ($k == 'YEAR' && $eia != '-')
                                    echo '<tr><td valign="top"><span class="spec_title">' . __('Baujahr') . ': </span></td><td>' . $eia . '</td></tr>';
                                if ($k == 'ROOM' && $eia != '-')
                                    echo '<tr><td valign="top"><span class="spec_title">' . __('Schlafzimmer') . ': </div></td><td>' . $eia . '</td></tr>';
                                if ($k == 'BATH' && $eia != '-')
                                    echo '<tr><td valign="top"><span class="spec_title">' . __('Bäder') . ': </span></td><td>' . $eia . '</td></tr>';
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
                        <tr>
                            <td><div class="spec_title"><?php echo __('Ref'); ?>:  </div></td>
                            <td><?php echo $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></td>
                        </tr>
                        <tr<?php echo (!empty($onlyrent)) ? ' class="row_rent"' : ''; ?>>
                            <td><div class="spec_title"><?php echo __('Kaufpreis'); ?>:</div></td>
                            <td>
                                <?php echo $objects[0]['Gesamtobjekt']['OBJ_PREIS'] ?>
                                <?php if (!empty($data['Gesamtobjekt']['OBJ_UET_PREISZUSATZ']) && $data['Gesamtobjekt']['OBJ_PREIS'] != 0): ?>
                                    | <?php echo $data['Gesamtobjekt']['OBJ_UET_PREISZUSATZ']; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php if (isset($rent)): ?>
                            <?php if (isset($onlyrent)): ?>
                                <tr>
                                    <td><div class="spec_title"><?php echo __('Mietpreis'); ?>:</div></td><td>&#8364; <?php echo $onlyrentprice ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2"><div class="row_rent"><?php echo __('Objekt kann angemietet werden, Preis auf Anfrage'); ?></div></td>
                                </tr>
                            <?php endif; ?>
                            <?php /* 04.02.13 */ if ($objects[0]['Gesamtobjekt']['OBJ_ID'] != 1605): ?>
                                <tr>
                                    <td colspan="2"><?php echo __('Die Maklercourtage beträgt 1,5 Monatsmieten zzgl. IVA und wird vom Mieter gezahlt.'); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>
                        <tr>
                            <td colspan="2"><div class="spec_titlex"><?php echo __('Provisionsfrei für den Käufer'); ?></div></td>
                        </tr>
                        <?php if ($objects[0]['Gesamtobjekt']['obj_energiepasslevel'] != 8): ?>
                            <tr>
                                <td><div class="spec_title"><?php echo __('Energieeffizienzklasse'); ?>:</div></td>
                                <td>
                                    <?php
                                    switch ($objects[0]['Gesamtobjekt']['obj_energiepasslevel']) {
                                        case 0: echo __('in Bearbeitung');
                                            break;
                                        case 1: echo 'A';
                                            break;
                                        case 2: echo 'B';
                                            break;
                                        case 3: echo 'C';
                                            break;
                                        case 4: echo 'D';
                                            break;
                                        case 5: echo 'E';
                                            break;
                                        case 6: echo 'F';
                                            break;
                                        case 7: echo 'G';
                                            break;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td colspan="2" style="border: none;">
                                <div id="detail_contact_button">
                                    <a data-keyboard="false" data-backdrop="static" data-target="#contact" data-toggle="modal" href="#"><?php echo __('Anfrage per E-Mail'); ?></a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5 w_100_768" style="color: #FFFFFF;">
                    <script type="text/javascript">
                        function openPop(what) {
                            var ww;
                            if (what == 'sms') {
                                ww = window.open('/gesamtobjekt/showsmspopup', '_blank', 'width=514,height=467,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,titlebar=no,toolbar=no');// height 624
                            }
                            else
                                ww = window.open('/gesamtobjekt/showcontactpopup/<?php echo $objects[0]['Gesamtobjekt']['OBJ_ID']; ?>', '_blank', 'width=514,height=660,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,titlebar=no,toolbar=no')
                            setTimeout(function() {
                                w = ($.browser.msie) ? ww.document.documentElement.offsetWidth : ww.outerWidth;
                                h = ($.browser.msie) ? ww.document.body.clientHeight + 20 : ww.outerHeight;
                                ww.moveTo((screen.availWidth / 2) - (w / 2), (screen.availHeight / 2) - (h / 2));
                                ww.focus();
                            }, 300);
                            return false;
                        }
                    </script>
                    <div class="add_details">
                        <a data-keyboard="false" data-backdrop="static" data-target="#sms" data-toggle="modal" href="#">
                            <img src="/img/phone_icon.png" /><?php echo __('SMS Rückruf-Service'); ?>
                        </a>
                    </div>
                    <div class="add_details">
                        <a data-keyboard="false" data-backdrop="static" data-target="#contact" data-toggle="modal" href="#">
                            <img src="/img/mail_icon.png" /><?php echo __('Anfrage per E-Mail'); ?>
                        </a>
                    </div>
                    <?php if (!empty($objects[0]['Gesamtobjekt']['PDF'])): //debug($objects[0]['Gesamtobjekt']['PDF']);  ?>
                        <div class="add_details"><a href="/pdf/<?php echo $objects[0]['Gesamtobjekt']['PDF'] ?>" target="_blank"><img src="/img/pdf_icon.png" /><?php echo __('Exposé laden (PDF)'); ?></a></div>
                    <?php endif; ?>
                    <?php if ($this->Session->check('lastSearch')): ?>
                        <div class="add_details">
                            <a href="<?php echo $this->Session->read('lastSearch'); ?>">
                                <img src="/img/display_icon.png" /><?php echo __('Zurück zur Auswahl'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br/><hr/><br/>

<!--<table class="content_box3" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="content_box3_col1"><?php echo __('Ref'); ?>: <?php echo $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></td>
<?php
// get info about next / prev property
$np = $this->Propertylinks->getPropertyId($objects[0]['Gesamtobjekt']['OBJ_ID']);
$to = (CakeSession::read('Config.language') != DEFAULT_LANGUAGE) ? CakeSession::read('Config.language') . '/' : '';
if (isset($np) && is_array($np)) {
    if (!empty($np['prev'])) {
        $linkcityprev = $np['prev']['REG_NAME'];
        if ($linkcityprev == 'unbekannt')
            $linkcityprev = 'Mallorca';
        if ($linkcityprev == '')
            $linkcityprev = 'Mallorca';
    }

    if (!empty($np['prev']) && $np['prev']['BER_EXPOSERELEVANT'] == 1) {
        $linkcityprev .= '_' . $np['prev']['BER_NAME'];
    }

    if (!empty($np['next'])) {
        $linkcitynext = $np['next']['REG_NAME'];
        if ($linkcitynext == 'unbekannt')
            $linkcitynext = 'Mallorca';
        if ($linkcitynext == '')
            $linkcitynext = 'Mallorca';
    }

    if (!empty($np['next']) && $np['next']['BER_EXPOSERELEVANT'] == 1) {
        $linkcitynext .= '_' . $np['next']['BER_NAME'];
    }
}
?>
        <td class="content_box3_col3" style="text-align: right;" colspan="2">
<?php if (count($np) && !empty($np['prev'])): ?>
    <?php
    echo
    $this->Html->link(__('Vorheriges Objekt'), '/' . $to . Inflector::slug($linkcityprev) . '_' .
            Inflector::slug($objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
            $np['prev']['OBJ_NUMMER'] . '.html', array('class' => 'xprev'));
    ?>
<?php endif; ?>
<?php if (count($np) && !empty($np['next'])): ?>
                                        &nbsp;|&nbsp;
    <?php
    echo
    $this->Html->link(__('Nächstes Objekt'), '/' . $to . Inflector::slug($linkcitynext) . '_' .
            Inflector::slug($objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
            $np['next']['OBJ_NUMMER'] . '.html', array('class' => 'xnext'));
    ?>
<?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="content_box3_col1"><h1><?php echo $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'] ?></h1></td>
        <td class="content_box3_col2">&nbsp;</td>
        <td class="content_box3_col3">&nbsp;</td>
    </tr>
    <tr>
        <td class="content_box3_col1"><?php echo preg_replace('%<br/>\s*%', '<br/><br/>', $objects[0]['Gesamtobjekt']['OBJ_UET_WERBETEXT']) ?></td>
        <td class="content_box3_col2">
            <table>
                <tr>
                    <td colspan="2">
<?php $coords = $this->Coords->getGeo($objects[0]['Gesamtobjekt']['OBJ_ID']); ?>
<?php echo __('Mallorca'); ?><?php if ($objects[0]['Gesamtobjekt']['REG_ID'] != 1) { ?>, <?php echo $objects[0]['Gesamtobjekt']['REG_NAME'] ?><?php if ($objects[0]['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) echo ', ' . $objects[0]['Gesamtobjekt']['BER_NAME']; ?><span style="float:right"><img src="/img/dot2.png" id="OBJ<?php echo $objects[0]['Gesamtobjekt']['OBJ_ID'] ?>lati<?php echo $coords['reg_latitude']; ?>long<?php echo $coords['reg_longitude']; ?>" class="map_icon"  rel="#googlemap"/></span><?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'] ?></td>
                </tr>
<?php
if (is_array($objects[0]['Gesamtobjekt']['EIAS'])):
    foreach ($objects[0]['Gesamtobjekt']['EIAS'] as $k => $eia): //debug($eia);
        if ($k == 'PLOT' && $eia != '-')
            echo '<tr><td valign="top" width="140"><span class="spec_title">' . __('Grundstück') . ': </span></td><td>' . $eia . ' m²</td></tr>';
        if ($k == 'LIVING' && $eia != '-')
            echo '<tr><td valign="top"><span class="spec_title">' . __('Wohnfläche') . ': </span></td><td>' . $eia . ' m²</td></tr>';
        if ($k == 'YEAR' && $eia != '-')
            echo '<tr><td valign="top"><span class="spec_title">' . __('Baujahr') . ': </span></td><td>' . $eia . '</td></tr>';
        if ($k == 'ROOM' && $eia != '-')
            echo '<tr><td valign="top"><span class="spec_title">' . __('Schlafzimmer') . ': </div></td><td>' . $eia . '</td></tr>';
        if ($k == 'BATH' && $eia != '-')
            echo '<tr><td valign="top"><span class="spec_title">' . __('Bäder') . ': </span></td><td>' . $eia . '</td></tr>';
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
                <tr>
                    <td><div class="spec_title"><?php echo __('Ref'); ?>:  </div></td><td><?php echo $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></td></tr>
                <tr<?php echo (!empty($onlyrent)) ? ' class="row_rent"' : ''; ?>><td><div class="spec_title"><?php echo __('Kaufpreis'); ?>:</div></td><td><?php echo $objects[0]['Gesamtobjekt']['OBJ_PREIS'] ?><?php if (!empty($data['Gesamtobjekt']['OBJ_UET_PREISZUSATZ']) && $data['Gesamtobjekt']['OBJ_PREIS'] != 0): ?> | <?php echo $data['Gesamtobjekt']['OBJ_UET_PREISZUSATZ'] ?><?php endif; ?></div></td></tr>

<?php if (isset($rent)): ?>
    <?php if (isset($onlyrent)): ?>
                                                                        <tr><td><div class="spec_title"><?php echo __('Mietpreis'); ?>:</div></td><td>&#8364; <?php echo $onlyrentprice ?></td></tr>
    <?php else: ?>
                                                                        <tr><td colspan="2"><div class="row_rent"><?php echo __('Objekt kann angemietet werden, Preis auf Anfrage'); ?></div></td></tr>
    <?php endif; ?>

    <?php /* 04.02.13 */ if ($objects[0]['Gesamtobjekt']['OBJ_ID'] != 1605): ?><tr><td colspan="2"><?php echo __('Die Maklercourtage beträgt 1,5 Monatsmieten zzgl. IVA und wird vom Mieter gezahlt.'); ?></td></tr><?php endif; ?>
<?php endif; ?>

                <tr><td colspan="2"><div class="spec_titlex"><?php echo __('Provisionsfrei für den Käufer'); ?></div></td></tr>
<?php if ($objects[0]['Gesamtobjekt']['obj_energiepasslevel'] != 8): ?>
                                            <tr>
                                                <td><div class="spec_title"><?php echo __('Energieeffizienzklasse'); ?>:</div></td>
                                                <td><?php
    switch ($objects[0]['Gesamtobjekt']['obj_energiepasslevel']) {
        case 0: echo __('in Bearbeitung');
            break;
        case 1: echo 'A';
            break;
        case 2: echo 'B';
            break;
        case 3: echo 'C';
            break;
        case 4: echo 'D';
            break;
        case 5: echo 'E';
            break;
        case 6: echo 'F';
            break;
        case 7: echo 'G';
            break;
    }
    ?></td>
                                            </tr>
<?php endif; ?>

                <tr>
                    <td colspan="2" style="border: none;"><div id="detail_contact_button"><a href="#" class="modalInput" rel="#contact"><?php echo __('Anfrage per E-Mail'); ?></a></div></td>
                </tr>
            </table>
        </td>

        <td class="content_box3_col3">

                    <div class="add_details">
<?php
//if($this->Bookmark->checkBookmarkStatus($objects[0]['Gesamtobjekt']['OBJ_ID']) == 'bookmark'){
//                $image = 'bookmark.png';
//                $text = __('Immobilie merken');
//                $action = 'add';
//            }else{
//                $image = 'bookmarked.png';
//                $text = __('Immobilie vorgemerkt');
//                $action = 'delete';
//            }
//            
?>
<?php //echo$this->Html->link($this->Html->image($image).$text, array('controller'=>'bookmark', 'action'=>$action, $objects[0]['Gesamtobjekt']['OBJ_ID']), array('escape' => false));                 ?>
                    </div>
            <script type="text/javascript">
                function openPop(what) {
                    var ww;
                    if (what == 'sms') {
                        ww = window.open('/gesamtobjekt/showsmspopup', '_blank', 'width=514,height=467,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,titlebar=no,toolbar=no');// height 624
                    }
                    else
                        ww = window.open('/gesamtobjekt/showcontactpopup/<?php echo $objects[0]['Gesamtobjekt']['OBJ_ID']; ?>', '_blank', 'width=514,height=660,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,titlebar=no,toolbar=no')
                    setTimeout(function() {
                        w = ($.browser.msie) ? ww.document.documentElement.offsetWidth : ww.outerWidth;
                        h = ($.browser.msie) ? ww.document.body.clientHeight + 20 : ww.outerHeight;
                        ww.moveTo((screen.availWidth / 2) - (w / 2), (screen.availHeight / 2) - (h / 2));
                        ww.focus();
                    }, 300);
                    return false;
                }
            </script>
                    <div class="add_details"><a href="#" class="modalInput" rel="#sms"><img src="/img/phone_icon.png" /><?php echo __('SMS Rückruf-Service'); ?></a>span onclick="openPop('sms');" class="modalInput"><img src="/img/phone_icon.png" /><?php echo __('SMS Rückruf-Service'); ?></span</div>
            <div class="add_details"><a href="#" class="modalInput" rel="#contact"><img src="/img/mail_icon.png" /><?php echo __('Anfrage per E-Mail'); ?></a>span onclick="openPop('contact');" class="modalInput"><img src="/img/mail_icon.png" style="margin-top:3px" /><?php echo __('Anfrage per E-Mail'); ?></span</div>
<?php if (!empty($objects[0]['Gesamtobjekt']['PDF'])): //debug($objects[0]['Gesamtobjekt']['PDF']);  ?>
                                        <div class="add_details"><a href="/pdf/<?php echo $objects[0]['Gesamtobjekt']['PDF'] ?>" target="_blank"><img src="/img/pdf_icon.png" /><?php echo __('Exposé laden (PDF)'); ?></a></div>
<?php endif; ?>
<?php if ($this->Session->check('lastSearch')): ?>
                                        <div class="add_details"><a href="<?php echo $this->Session->read('lastSearch'); ?>"><img src="/img/display_icon.png" /><?php echo __('Zurück zur Auswahl'); ?></a></div>
<?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="content_box3_col1">&nbsp;</td>
<?php
// get info about next / prev property
// $np = $this->Propertylinks->getPropertyId($objects[0]['Gesamtobjekt']['OBJ_ID']); //debug($np);
?>
        <td class="content_box3_col3" colspan="2" style="text-align: right;">
<?php if (count($np) && !empty($np['prev'])): ?>
    <?php
    echo
    $this->Html->link(__('Vorheriges Objekt'), '/' . $to . Inflector::slug($linkcityprev) . '_' .
            Inflector::slug($objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
            $np['prev']['OBJ_NUMMER'] . '.html', array('class' => 'xprev'));
    ?>
<?php endif; ?>
<?php if (count($np) && !empty($np['next'])): ?>
                                        &nbsp;|&nbsp;
    <?php
    echo
    $this->Html->link(__('Nächstes Objekt'), '/' . $to . Inflector::slug($linkcitynext) . '_' .
            Inflector::slug($objects[0]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']) . '-' .
            $np['next']['OBJ_NUMMER'] . '.html', array('class' => 'xnext'));
    ?>
<?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
</table>-->
<?php echo $this->element('sms'); ?>
<?php echo $this->element('contact'); ?>
<?php echo $this->element('map'); ?>