<?php

namespace App\Console\Commands;

use App\Models\Secret;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteExpiredSecrets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-secrets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all expired secrets from the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $secretsDeleted = Secret::where('expiresAt', '<', Carbon::now('UTC'))->delete();
        Log::info('Deleted ' . $secretsDeleted . ' secrets.');
    }
}
