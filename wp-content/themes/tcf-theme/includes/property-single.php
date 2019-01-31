<?php 
$property_type = get_field('property_type', $property->ID) ?: 'movein';

$fields = [
    'movein' => [
       'village', 'price', 'type', 'status',  'plan', 'size', 'beds', 'baths', 'garages',
    ],
    'plan' => [
       'village', 'price', 'type', 'status',  'plan', 'size', 'beds', 'baths', 'garages', 'lot_size',
    ],
    'lot' => [
        'village', 'price', 'type', 'status',  'plan', 'size', 'beds', 'baths', 'garages', 'lot_size',
    ],
];

$fields = array_map(function($field) use ($property){
    return get_field_object($field, $property->ID);
}, $fields[$property_type]);

$fields = array_filter($fields, function($field){
    return isset($field['value']) && strlen($field['value']) > 0;
});

load_include('property-' . $property_type, [
    'property' => $property,
    'fields' => $fields,
    'property_type' => $property_type,
    'page' => $page,
]);