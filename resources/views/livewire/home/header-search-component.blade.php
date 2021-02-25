<div>
    <form @if ($selectedCategory == 'seller-general' || $selectedCategory == 'seller-property' || $selectedCategory == 'seller-job' ) action="{{ route('search.seller_ad') }}" @else action="{{ route('search.buyer_ad') }}" @endif>
        <div class="header-search-bar input-group">
            <div class="search-dropdown">
                <select class="form-select" name="selectedCategory" wire:model.lazy="selectedCategory" required>
                    <option value="">Categories</option>
                    <optgroup label="Seller Advertisement">
                        <option value="seller-general">General</option>
                        <option value="seller-property">Properties</option>
                        <option value="seller-job">Job</option>
                    </optgroup>
                    <optgroup label="Buyer Advertisement">
                        <option value="buyer-general">General</option>
                        <option value="buyer-property">Properties</option>
                        <option value="buyer-job">Job</option>
                    </optgroup>
                </select>
            </div>
            <input type="text" class="search-bar-input form-control" placeholder="Search..." name="headerSearch" wire:model.lazy="headerSearch">
            <button type="submit" class="btn btn-primary search-bar-btn"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>
