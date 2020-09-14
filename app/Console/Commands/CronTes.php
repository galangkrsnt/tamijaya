<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Pesanan;
use Carbon\Carbon;

class CronTes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:autoDel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Otomatis Hapus Data';

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
     * @return mixed
     */
    public function handle()
    {
        $pesanan = Pesanan::where('created_at','<',Carbon::now()->subHours(6))
        ->where('status','menunggu pembayaran');
        $pesanan->delete();
    }
}
