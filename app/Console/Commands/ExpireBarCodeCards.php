<?php

namespace App\Console\Commands;

use App\Models\BarCodeCard;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireBarCodeCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cards:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Expires certain cards after the expire date.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->toDateString();

    // Get all barcode cards that expired and whose passenger is still "active"
    $expiredCards = BarCodeCard::with('passenger')
        ->where('expire_date', '<', $today)
        ->whereHas('passenger', function ($query) {
            $query->where('status', "=",'Active');
        })
        ->get();

    $count = 0;

    foreach ($expiredCards as $card) {
        if ($card->passenger) {
            $card->passenger->status = 'Expired';
            $card->passenger->save();
            $count++;
        }
    }
    }
}
