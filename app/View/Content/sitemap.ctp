<?php
$this->set('title_for_layout', __('Sitemap Finest Properties Mallorca SL Immobilienbüro auf Mallorca'));
$this->set('metadesc', __('Sitemap von Finest Properties Mallorca, dem Immobilienbüro für exklusive Immobilien auf Mallorca.'));
?>
<?php //debug($objects);?>
<div class="staticcontentbg">
    <div class="staticcontentarea">
        <h4 class="orange"><?php echo __('Alle Angebote im Überblick'); ?></h4>
        <table id="sitemap">
            <tr>
                <td colspan="2"><strong><?php echo __('Kategorie / Ort / Referenz / Titel'); ?></strong></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
        <?php if(count($objects) > 0): ?>
        <?php foreach($objects as $k => $v): ?>
            <?php
                $linkcity = ($v['Gesamtobjekt']['REG_ID'] > 1) ? $v['Gesamtobjekt']['REG_NAME']: 'Mallorca';
                if($v['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1){
                    $linkcity .= '_'.$v['Gesamtobjekt']['BER_NAME'];
                }
            ?>
            <tr>
                <td nowrap=""><?=$this->Html->link(
                        $v['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'],
                                                $this->Flags->changeUrl(
                                                    $this->Session->read('Config.language'),
                                                    array('controller' => 'gesamtobjekt', 'action' => 'search'),
                                                    true,
                                                    Inflector::slug($v['Gesamtobjekt']['OBI_UET_BESCHREIBUNG']),
                                                    $catsarray
                                                ));?>
            </tr>
            
            <tr><td style="border-bottom:#6f7072 1px solid;"></td></tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </table>
    </div>
</div>     