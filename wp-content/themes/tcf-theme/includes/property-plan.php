<?php 

echo "<div class='section'>";
    echo "<div class='container'>";
        echo "<div class='row'>";
            echo "<div class='col-lg-4'>";
                echo "<img class='img-fluid' src='". get_the_post_thumbnail_url( $property->ID, 'tcf-property-portrait' ) ."' alt='". get_the_title($property->ID) ."'>";
            echo "</div>";
            echo "<div class='col-lg-8'>";
                echo "<h1 class='heading-alt'>". get_the_title($property->ID) ."</h1>";
                load_include('property-info', ['property' => $property, 'fields' => $fields, 'property_type' => $property_type, 'page' => $page]);
            echo "</div>";
        echo "</div>";

     echo "</div>";


    if( !empty(get_field('gallery', $property->ID)) ){
        echo "<div class='container mt-5'>";
            echo "<h2>Property Images</h2>";
        echo "</div>";
        load_include('property-slider', ['property' => $property]);
    }

echo "</div>";

