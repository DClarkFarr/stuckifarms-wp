<section class="section">
    <div class="container">
        <form action="" method="GET">
            <div class="row justify-content-center">
                <div class="col-lg-8"><h2>Property Search Form</h2></div>
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