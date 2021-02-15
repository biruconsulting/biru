<div>
    <form action="#">
        <div class="header-search-bar input-group">
            <div class="search-dropdown">
                <select class="form-select" name="header_ad_category" value="{{ $header_ad_category }}" wire:model="selectedCategory">
                    <option selected>Categories</option>
                    <optgroup label="Seller Advertisement">
                        <option value="seller_general">General</option>
                        <option value="seller_properties">Properties</option>
                        <option value="seller_job">Job</option>
                    </optgroup>
                    <optgroup label="Buyer Advertisement">
                        <option value="buyer_general">General</option>
                        <option value="buyer_properties">Properties</option>
                        <option value="buyer_job">Job</option>
                    </optgroup>
                </select>
            </div>
            <input type="text" name="header_search" value="{{ $header_search }}" class="search-bar-input form-control" placeholder="Search by Name, Location...">
            <button type="submit" class="btn btn-primary search-bar-btn"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>