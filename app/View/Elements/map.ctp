<div class="modal" id="googlemap">
    <a class="close"></a>
    <div class="header">
        <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Immobilien-Finest-Properties'); ?>"/>
    </div>
    <?php
    echo $this->GoogleMapV3->map(array('div' => array('height' => '400', 'width' => '100%')));
    $markers = array(
        array('lat' => 39.57817336212527, 'lng' => 2.6531982421875, 'color' => 'orange')
    );
    $options = array(
        'lat' => 39.57817336212527,
        'lng' => 2.6531982421875,
        'markers' => $this->GoogleMapV3->staticMarkers($markers),
    );
    $this->GoogleMapV3->addMarker($options);
    echo $this->GoogleMapV3->script();
    ?>
</div>