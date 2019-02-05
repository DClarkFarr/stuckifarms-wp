<?php 
$property_type = get_field('property_type', $property->ID) ?: 'movein';
$gallery = get_field('gallery', $property->ID);

?>
<?php if( !empty($gallery) && count($gallery) ){ ?>
<div class="container">
    <div class="slider">
        <ul id="property-slider">
            <?php 
            foreach($gallery as $img){
                $thumb = $img['sizes']['tcf-property-slide-thumb'] ?: $img['url'];
                $src = $img['sizes']['tcf-property-slide'] ?: $img['url'];
                ?>
                <li data-thumb="<?php echo $thumb; ?>" data-src="<?php echo $src; ?>">
                    <img src="<?php echo $src; ?>" />
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<?php } ?>