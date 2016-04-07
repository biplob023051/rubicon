

<?php
$callItems = $this->requestAction('bookmark/search/short');
$items = $this->Session->read('objectSlider');
foreach($items as $k => $obj_nummer):
    //debug($obj_nummer);
?>


<li class="jcarousel-item">
    <label for="obj_nummer<?=$obj_nummer['OBJ_ID'];?>">
        <img src="/imagesrc/resize.php?src=<?=$obj_nummer['OBJ_NUMMER']?>-1.jpg&q=100&w=160" alt="<?=@$alt?>"/>
    </label>
    <span><?=$obj_nummer['OBJ_NUMMER'];?> auch anfragen</span>
    <input type='checkbox' name="data[Contact][Objektnummer][<?=$obj_nummer['OBJ_NUMMER'];?>]" value="<?=$obj_nummer['OBJ_NUMMER'];?>" id="obj_nummer<?=$obj_nummer['OBJ_ID'];?>" checked="checked"/>
</li>

<?php
    endforeach;
?>