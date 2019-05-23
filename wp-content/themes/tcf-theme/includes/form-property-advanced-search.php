<?php 


$simple_fields = [
    'category',
    'price_min',
    'beds_min',
    'baths_min',
    'page',
    'p',
];

$get_fields = array_keys(array_filter($_GET ?: []));
$get_fields = array_filter($get_fields, function($field) use ($simple_fields) {
    return !in_array($field, $simple_fields);
});

if( count($get_fields) > 0 ){
    $advanced = true;
    $simple = false;
}else{
    $advanced = false;
    $simple = true;
}

?>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"><h2>Property Search Form</h2></div>
        </div>
        <div class="simple-form" style="<?php echo ($advanced ? 'display: none;' : ''); ?>">
            <div class="row justify-content-center">
                <div class="col-lg-10 offset-lg-2">
                    <?php load_include('form-property-search', ['text_class' => 'text-default']); ?>
                </div>
            </div>
            
        </div>
        <form class="advanced-form" style="<?php echo ($simple ? 'display: none;' : ''); ?>" action="" method="GET">
            <div class="row justify-content-center">
                <div class="w-100"></div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="mb-0 text-bold">Property Type</label>
                        <div class="pl-3">
                            <?php 
                            $terms = get_terms(array(
                                'taxonomy' => 'property_cat',
                                'hide_empty' => false,
                                'orderBy' => 'count',
                                'order' => 'DESC',
                            ));
                            foreach($terms as $term){
                                if($term->name == 'Custom Made Homes'){
                                    continue;
                                }
                                ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $term->term_id; ?>" <?php echo isset($_GET['category']) && in_array($term->term_id, $_GET['category']) ? 'checked' : ''; ?>>
                                        <?php echo $term->name; ?>
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <label class="mb-0 text-bold">Has Feature:</label>
                        <div class="pl-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="feature[]" value="has_rvgarage" <?php echo isset($_GET['feature']) && in_array('has_rvgarage', $_GET['feature']) ? 'checked' : ''; ?>>
                                    RV Garage
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="feature[]" value="has_casita" <?php echo isset($_GET['feature']) && in_array('has_casita', $_GET['feature']) ? 'checked' : ''; ?>>
                                    Casita
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="mb-0 text-bold"># Floors</label>
                                <select name="number_of_floors" class="form-control">
                                    <option value="">Any</option>
                                    <option value="1" <?php echo (isset($_GET['number_of_floors']) && $_GET['number_of_floors'] == 1 ? 'selected' : ''); ?>>1 Floor</option>
                                    <option value="2" <?php echo (isset($_GET['number_of_floors']) && $_GET['number_of_floors'] == 2 ? 'selected' : ''); ?>>2 Floors</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="mb-0 text-bold">Builder</label>
                                <select name="builder_id" class="form-control">
                                    <option value="">Any</option>
                                    <?php 
                                    $builders = new WP_Query([
                                        'post_type' => 'builder',
                                        'limit' => -1,
                                        'orderBy' => 'title',
                                        'order' => 'ASC',
                                        'limit' => -1,
                                    ]);
                                    while($builders->have_posts()){
                                        $builders->the_post();
                                        echo "<option value='". get_the_ID() ."' ". (!empty($_GET['builder_id']) && $_GET['builder_id'] == get_the_ID() ? 'selected' : '') .">". get_the_title() ."</option>";
                                    }

                                    wp_reset_postdata();
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-12 pt-3">
                                <label class="mb-0 text-bold">Area/SqFt</label>
                                <select name="size" class="form-control">
                                    <option value="">Any</option>
                                    <option <?php echo (isset($_GET['size']) && $_GET['size'] == '1600-1900' ? 'selected' : ''); ?> value="1600-1900">1600-1900</option>
                                    <option <?php echo (isset($_GET['size']) && $_GET['size'] == '1900-2200' ? 'selected' : ''); ?> value="1900-2200">1900-2200</option>
                                    <option <?php echo (isset($_GET['size']) && $_GET['size'] == '2200-3000' ? 'selected' : ''); ?> value="2200-3000">2200-3000</option>
                                    <option <?php echo (isset($_GET['size']) && $_GET['size'] == '3000' ? 'selected' : ''); ?> value="3000-">3000 Up</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="mb-0 text-bold">Price Range</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Min (In Thousands)</label>
                                <input type="text" class="form-control" name="price_min" value="<?php echo isset($_GET['price_min']) ? $_GET['price_min'] : ''; ?>" placeholder="Any">
                            </div>
                            <div class="col-lg-6">
                                <label>Max (In Thousands)</label>
                                <input type="text" class="form-control" name="price_max" value="<?php echo isset($_GET['price_max']) ? $_GET['price_max'] : ''; ?>" placeholder="Any">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-0 text-bold">Bedrooms</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Min</label>
                                <input type="text" class="form-control" name="beds_min" value="<?php echo isset($_GET['beds_min']) ? $_GET['beds_min'] : ''; ?>" placeholder="Any">
                            </div>
                            <div class="col-lg-6">
                                <label>Max</label>
                                <input type="text" class="form-control" name="beds_max" value="<?php echo isset($_GET['beds_max']) ? $_GET['beds_max'] : ''; ?>" placeholder="Any">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-0 text-bold">Bathrooms</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Min</label>
                                <input type="text" class="form-control" name="baths_min" value="<?php echo isset($_GET['baths_min']) ? $_GET['baths_min'] : ''; ?>" placeholder="Any">
                            </div>
                            <div class="col-lg-6">
                                <label>Max</label>
                                <input type="text" class="form-control" name="baths_max" value="<?php echo isset($_GET['baths_max']) ? $_GET['baths_max'] : ''; ?>" placeholder="Any">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-lg-8">
                    <hr>
                    <div class="form-group text-right">
                        <button class="btn btn-theme">Search Properties</button>
                    </div>
                </div>
            </div> <!-- end main row -->
            <input type="hidden" name="new_search" value="1">
        </form>
    </div>
</section>

<script>
$(function(){
    var advanced = $('.advanced-form');
    var simple = $('.simple-form');

    simple.find('form .col-md-1:last').before('<div class="col-md-2">'+
        '<label>&nbsp</label>'+
        '<button type="button" class="btn btn-link btn-block show-advanced">Advanced <i class="far fa-caret-down"></i></button>'+ 
    '</div>');

    advanced.find('.col-lg-8:last .form-group.text-right').prepend('<button class="btn btn-link hide-advanced" type="button">Simple Search <i class="far fa-caret-up"></i></button>');

    $('.hide-advanced').on('click', function(){
        advanced.slideUp(250);
        simple.slideDown(250);
    })
    $('.show-advanced').on('click', function(){
        simple.slideUp(250);
        advanced.slideDown(300);
    })


})

</script>