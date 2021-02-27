<?php

namespace App\Console\Commands;

use App\Models\BuyerAd;
use App\Models\SellerAd;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteExpiredAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertisement:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will delete expired advertisements automatically.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SellerAd::where('expired_at', '<', Carbon::now())->delete();

        BuyerAd::where('expired_at', '<', Carbon::now())->delete();
    }
}
