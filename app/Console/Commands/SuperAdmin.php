<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:superadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make SuperAdmin';

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
        $email = "chandansingh16794@gmail.com";
        User::where('email', $email)->forceDelete();
        User::create([
            'name' => "chandan",
            "email" => $email,
            "password" => Hash::make("password"),
            "is_super_admin" => 1
        ]);
        $this->info('The command was successful!');
        return 0;
    }
}
