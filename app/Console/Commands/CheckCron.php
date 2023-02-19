<?php

namespace App\Console\Commands;

use App\Models\BookingCar;
use App\Models\Car;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \Log::info("Cron is working fine!");
        \Log::info(Carbon::now());
        /*
        Write your database logic we bellow:
        */

        $allBookings = BookingCar::where('car_id', "!=", 'NULL')->where('driver_id', "!=", 'NULL')->get();

        foreach($allBookings as $booking) {
            if($booking->to < Carbon::now()) {
                $car = Car::where('id', $booking->car_id)->first();
                $driver = Driver::where('id', $booking->driver_id)->first();
                $car->active = 0;
                $car->save();
                $driver->active = 0;
                $driver->save();
                $booking->status = 'Finished';
                $booking->save();
                \Log::info("booking dis active!");
            }
        }
    }
}
