<section class="section section-sm bg-theme">
    <form action="<?php echo get_home_url() . '/property-search/'; ?>">
        <input type="hidden" name="new_search" value="1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-white">Price Range</label>
                        <select name="price" class="form-control">
                            <option value="">Any</option>
                            <option value="-100">Under 100k</option>
                            <option value="100-200">100-200k</option>
                            <option value="200-350">200-350k</option>
                            <option value="350-">350k+</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="text-white">Bedrooms</label>
                        <select name="bedrooms" class="form-control">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="text-white">Bathrooms</label>
                        <select name="bathrooms" class="form-control">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div><label>&nbsp;</label></div>
                        <button class="btn btn-light"><i class="far fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>