<?php

namespace App\Http\Livewire\Admin;

use App\Models\BuyerAd;
use App\Models\Category;
use App\Models\SellerAd;
use App\Models\User;
use Livewire\Component;


class AdminDashboardComponent extends Component
{
    public function render()
    {
        $admin_count = User::where('user_type', 'ADM')->get()->count();
        $registered_users = User::where('user_type', 'USR')->get()->count();
        $seller_ads = SellerAd::get()->count();
        $buyer_ads = BuyerAd::get()->count();

        return view('livewire.admin.admin-dashboard-component',['admin_count'=>$admin_count, 'registered_users'=>$registered_users, 'seller_ads'=>$seller_ads, 'buyer_ads'=>$buyer_ads])->layout('layouts.admin');
    }
}
