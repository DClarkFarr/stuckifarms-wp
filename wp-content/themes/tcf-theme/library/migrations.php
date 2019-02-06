<?php 

// $my_post = array(
//   'post_title'    => wp_strip_all_tags( $_POST['post_title'] ),
//   'post_content'  => $_POST['post_content'],
//   'post_status'   => 'publish',
//   'post_author'   => 1,
//   'post_parent' => 111,
//   'post_type' => 'page',
//   'post_name' => 'slug',
// );

include '../../../../wp-load.php';

$investPage = get_page_by_path('invest-here');
$vacationPage = get_page_by_path('vacation-here');
$buyerToolsPage = get_page_by_path('buyer-tools');

$investPages = [
    [
        'post_title' => 'Buy A Cottage',
        'post_name' => 'buy-a-cottage',
        'post_parent' => $investPage->ID,
    ], 
    [
        'post_title' => 'Buy A Villa',
        'post_name' => 'buy-a-villa',
        'post_parent' => $investPage->ID,
    ],
    [
        'post_title' => 'Build Here',
        'post_name' => 'build-here',
        'post_parent' => $investPage->ID,
    ],
    [
        'post_title' => 'Other Investments',
        'post_name' => 'other-investments',
        'post_parent' => $investPage->ID,
    ],
];

$vacationPages = [
    [
        'post_title' => 'Cottages',
        'post_name' => 'cottages',
        'post_parent' => $vacationPage->ID,
    ],
    [
        'post_title' => 'Cottages Court',
        'post_name' => 'cottages-court',
        'post_parent' => $vacationPage->ID,
    ],
    [
        'post_title' => 'Villas',
        'post_name' => 'villas',
        'post_parent' => $vacationPage->ID,
    ],
];

$buyerToolsPages = [
    [
        'post_title' => 'Mortgage Calculator',
        'post_name' => 'calculate-mortgage',
        'post_parent' => $buyerToolsPage->ID,
    ],
    [
        'post_title' => 'Finance Your Home',
        'post_name' => 'finance-your-home',
        'post_parent' => $buyerToolsPage->ID,
    ],
    [
        'post_title' => 'Warranty',
        'post_name' => 'warranty',
        'post_parent' => $buyerToolsPage->ID,
    ],
    [
        'post_title' => 'Buyer\'s Guide',
        'post_name' => 'buyers-guide',
        'post_parent' => $buyerToolsPage->ID,
    ],
    [
        'post_title' => 'FAQs',
        'post_name' => 'frequent-questions',
        'post_parent' => $buyerToolsPage->ID,
    ],
];

foreach($investPages as $row){
    $exists = get_page_by_path($investPage->post_name . '/' . $row['post_name']);
    echo 'checking page ' . $row['post_name'] . ': ';
    if(!$exists){
        echo 'creating ' . "\n";
        create_page($row);
    }else{
        echo 'exists ' . "\n";
    }
}

foreach($vacationPages as $row){
    $exists = get_page_by_path($vacationPage->post_name . '/' . $row['post_name']);
    echo 'checking page ' . $row['post_name'] . ': ';
    if(!$exists){
        echo 'creating ' . "\n";
        create_page($row);
    }else{
        echo 'exists ' . "\n";
    }
}

foreach($buyerToolsPages as $row){
    $exists = get_page_by_path($buyerToolsPage->post_name . '/' . $row['post_name']);
    echo 'checking page ' . $row['post_name'] . ': ';
    if(!$exists){
        echo 'creating ' . "\n";
        create_page($row);
    }else{
        echo 'exists ' . "\n";
    }
}

$otherPages = [
    [
        'post_title' => 'Property Search',
        'post_name' => 'property-search',
    ],
    [
        'post_title' => 'Work Here',
        'post_name' => 'work-here',
        'post_content' => '[coming_soon]',
    ],
    [
        'post_title' => 'Parade of Homes',
        'post_name' => 'parade-of-homes',
        'post_content' => '[coming_soon]',
        'post_type' => 'post',
    ],
];


foreach($otherPages as $row){
    $exists = get_page_by_path($row['post_name']);
    echo 'checking page ' . $row['post_name'] . ': ';
    if(!$exists){
        echo 'creating ' . "\n";
        create_page($row);
    }else{
        echo 'exists ' . "\n";
    }
}

echo '<pre>';