<?php

namespace App\Console\Commands;

use App\Models\Paste;
use DateInterval;
use Illuminate\Console\Command;

class CleanExpiredPaste extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-expired-paste';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $pastes = Paste::all();

        foreach ($pastes as $paste) {

            $created_at = $paste->created_at;
            $expire = $paste->expiration_time->volume;

            try {
                $time = $created_at->add(new DateInterval('PT' . $expire . 'M'));

                if($time < now()) {
                    $paste->delete();
                }
            } catch (\Exception $e) {}
        }
    }
}
