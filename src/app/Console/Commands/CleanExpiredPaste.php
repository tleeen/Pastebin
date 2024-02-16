<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use DateInterval;
use Illuminate\Console\Command;

class CleanExpiredPaste extends Command
{
    /**
     * @param PasteRepositoryInterface $repository
     */
    public function __construct(private readonly PasteRepositoryInterface $repository){
        parent::__construct();
    }

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
        $pastes = $this->repository->getAll();

        foreach ($pastes as $paste) {

            $created_at = $paste->created_at;
            $expire = $paste->expiration_time->volume;

            try {
                $time = $created_at->add(new DateInterval('PT' . $expire . 'M'));

                if($time < now()) {
                    $this->repository->delete($paste->id);
                }
            } catch (\Exception $e) {}
        }
    }
}
