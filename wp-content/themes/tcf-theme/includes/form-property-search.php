<?php 
$params = array_merge([
    'justify_row' => '',
    'button_primary' => true,
], !empty($params) ? $params : []);

$price_min = [
    '100' => '100k+',
    '200' => '200k+',
    '350' => '350k+',
    '450' => '450k+',
];

$beds_min = [
    "1" => '1+',
    "2" => '2+',
    "3" => '3+',
    "4" => '4+',
];

$baths_min = [
    '1' => '1+',
    '2' => '2+',
    '3' => '3+',
    '4' => '4+',
];

foreach(['price_min', 'beds_min', 'baths_min'] as $var){
    foreach(${$var} as $key => $val){
        ${$var}[$key] = [
            'value' => $key,
            'label' => $val,
            'active' => !empty($_GET[$var]) && $_GET[$var] == $key,
        ];
    }

    ${$var} = array_values(${$var});
}

$category = [];
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
    $name = $term->name;;

    if($name == 'Cottages'){
        $name = 'Vacation Rentals';
    }

    $category[] = [
        'label' => $name,
        'value' => $term->term_id,
        'active' => !empty($_GET['category']) && is_array($_GET['category']) && in_array($term->term_id, $_GET['category']),
    ];

}

$renderOptions = function($options){
    foreach($options as $o){
        echo "<option value='". esc_attr($o['value']) ."' ". ($o['active'] ? 'selected' : '') .">";
            echo $o['label'];
        echo "</option>";
    }
}

?>
<form action="<?php echo get_home_url() . '/property-search/'; ?>">
    <input type="hidden" name="new_search" value="1">
    
    <div class="row <?php echo $params['justify_row']; ?>">
        <div class="col-md-3">
            <label for="" class="text-white">Property Type</label>
            <select name="category[]" class="form-control">
                <option value="">Any</option>
                <?php $renderOptions($category) ?>
                
            </select>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-white">Price</label>
                <select name="price_min" class="form-control">
                    <option value="">Any</option>
                    <?php $renderOptions($price_min) ?>
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label class="text-white">Bedrooms</label>
                <select name="beds_min" class="form-control">
                    <option value="">Any</option>
                    <?php $renderOptions($beds_min) ?>
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label class="text-white">Bathrooms</label>
                <select name="baths_min" class="form-control">
                    <option value="">Any</option>
                    <?php $renderOptions($baths_min) ?>
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <div><label>&nbsp;</label></div>
                <button class="btn <?php echo $params['button_primary'] ? 'btn-theme' : 'btn-light'; ?>"><i class="far fa-search"></i> Search</button>
            </div>
        </div>
    </div>
    
</form>
