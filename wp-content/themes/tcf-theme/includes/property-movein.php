<?php 

echo "<div class='section'>";
    echo "<div class='container'>";
        echo "<h1 class='heading-alt'>". get_the_title() ."</h1>";
    echo "</div>";

    load_include('property-slider', ['property' => $property]);

echo "</div>";

echo "<section class='section-sm'>";
    echo "<div class='container'>";
        load_include('property-info', ['property' => $property, 'fields' => $fields, 'property_type' => $property_type, 'page' => $page]);
    echo "</div>";
echo "</section>";

//load_include('agent-info');

load_include('property-request-form');

load_include('property-related', ['property' => $property]);