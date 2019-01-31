<?php 
    $origin = !empty($origin) ? $origin : 'request';

    $titles = [
        'request' => 'Property Request Form',
        'buy' => 'Want to buy? Get more details!',
        'schedule' => 'Schedule Private Showing',
        'agent' => 'Ask an Agent'
    ];
?>
<section class="section section">
    <div class="container">
        <?php 
        if(empty($hide_title)){
            foreach($titles as $key => $title){
                echo '<h4 data-origin="'. $key .'" class="subheading bottom-bar bottom-bar-blue '. ($key == $origin ? '' : 'hidden') .'">'. $title .'</h4>';
            }
        }
        
        ?>
        
        <div class="row">
            <div class="col-lg-8">
                <p>
                    Fill out the form below and we'll get back to you with whatever you need to know!
                </p>
            </div>
        </div>
        
        <?php echo do_shortcode('[contact-form-7 id="106" form_source="'. $origin .'"]'); ?>

    </div>
</section>