<section class="section section-sm bg-theme">
    <form action="<?php echo get_home_url() . '/property-search/'; ?>">
        <input type="hidden" name="new_search" value="1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <label for="" class="text-white">Property Type</label>
                    <select name="category[]" class="form-control">
                        <option value="">Any</option>
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
                            $name = $term->name;;

                            if($name == 'Cottages'){
                                $name = 'Vacation Rentals';
                            }
                            echo "<option value='". $term->term_id ."'>";
                               echo $name;
                            echo "</option>";
                        }
                        ?>
                        
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="text-white">Price</label>
                        <select name="price_min" class="form-control">
                            <option value="">Any</option>
                            <option value="100">100k+</option>
                            <option value="200">200k+</option>
                            <option value="350">350k+</option>
                            <option value="450">450k+</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label class="text-white">Bedrooms</label>
                        <select name="beds_min" class="form-control">
                            <option value="">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label class="text-white">Bathrooms</label>
                        <select name="bathrooms" class="form-control">
                            <option value="">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <div><label>&nbsp;</label></div>
                        <button class="btn btn-light"><i class="far fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>