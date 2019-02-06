
<h4 class="subheading bottom-bar bottom-bar-blue">Property Description</h4>
<div class="row">
    <div class="col-md-5">
        <dl class="row no-gutters">
         
            <?php foreach($fields as $field){ ?>
                <dt class="col-4 pr-3 text-right"><?php echo $field['label']; ?></dt>
                <dd class="col-8"><?php echo $field['value']; ?></dd>
            <?php } ?>
            <?php if( !empty( ($builder_id = get_field('builder_id', $property->ID)) ) ){ ?>
                <?php 
                $builder = get_post($builder_id); 
                ?>
                <dt class="col-4 pr-3 text-right">Builder</dt>
                <dd class="col-8"><?php echo $builder->post_title; ?></dd>
            <?php } ?>

            <?php 
            $boolColumns = [
                'has_rvgarage' => 'RV Garage',
                'has_casita' => 'Casita',
            ];
            foreach($boolColumns as $column => $label){
            ?>
                <dt class="col-4 pr-3 text-right"><?php echo $label; ?></dt>
                <dd class="col-8"><?php echo ( get_field($column, $property->ID) ? 'Yes' : 'No' ); ?></dd>
            <?php
            }
            ?>
        </dl>
    </div>
    <div class="col-md-7">
        <p class="text-bold">Description</p>
        <p class="description">
            <?php the_content(); ?>
        </p>
        <br>
        <div class="row">
            <?php 
            $download = get_field('download_plan', $property->ID);

            $columnClass = !empty($twoColumns) ? 'col-lg-6' : 'col-lg-4';
            ?>
            
            <?php if($download){ ?>
                <div class="<?php echo $columnClass; ?> mb-4">
                    <a href="<?php echo $download; ?>" class="btn btn-arrow"><span>Download Plan</span></a>
                </div>
            <?php } ?>
           
            <div class="<?php echo $columnClass; ?> mb-4">
                <a href="<?php echo site_url(); ?>/buyer-tools/calculate-mortgage/" class="btn btn-arrow"><span>Calculate Mortgage</span></a>
            </div>
            <div class="<?php echo $columnClass; ?> mb-4">
                <a href="<?php echo site_url(); ?>/contact/?from=talk" class="btn btn-arrow"><span>Talk to an Agent</span></a>
            </div>
            <div class="<?php echo $columnClass; ?> mb-4">
                <a href="<?php echo site_url(); ?>/contact/?from=buy" class="btn btn-arrow"><span>Buy it Now</span></a>
            </div>
            <div class="<?php echo $columnClass; ?> mb-4">
                <a href="<?php echo site_url(); ?>/contact/?from=schedule" class="btn btn-arrow"><span>Schedule a Visit</span></a>
            </div>
            <div class="<?php echo $columnClass; ?> mb-4">
                <a href="<?php the_permalink( $page->ID ); ?>" class="btn btn-arrow"><span>Keep Searching</span></a>
            </div>
        </div>
    </div>
</div>