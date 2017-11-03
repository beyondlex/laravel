<?php

namespace App\Console\Commands;

use App\Mail\Test;
use App\Models\User;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user=1 : The id of user} {--queue : Whether the job should be queued}';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $userId = $this->argument('user');
        if (!$userId) {
            $this->error('Can not send email without user id.');
            return;
        }
        /** @var User $user */
        $user = User::find($userId);
        if (!$user) {
            $this->error('Can not find user by id: '. $userId);
            return;
        }
        if ($this->confirm("Email will send to {$user->email}. continue? [y|N]")) {
            $shouldQueue = $this->option('queue');
            if ($shouldQueue) {
                \Mail::to($user)->queue(new Test());
            } else {
                \Mail::to($user)->send(new Test());
            }
        }
    }
}
