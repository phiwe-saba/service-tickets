<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SetupProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password = $this->argument('password');

        // Create the database
        DB::statement("CREATE DATABASE IF NOT EXISTS logtickstdb");

        // Configure .env file with the provided database credentials
        $this->configureEnvironmentFile($username, $password);

        // Run migrations and seed data
        $this->call('migrate');
        $this->call('db:seed');
        
        $this->info('Project setup completed successfully.');
    }

    private function configureEnvironmentFile($username, $password)
    {
        // Read the .env file
        $envFile = base_path('.env');
        $envContents = file_get_contents($envFile);

        // Update database credentials
        $envContents = preg_replace(
            '/DB_USERNAME=(.*)/',
            'DB_USERNAME=' . $username,
            $envContents
        );

        $envContents = preg_replace(
            '/DB_PASSWORD=(.*)/',
            'DB_PASSWORD=' . $password,
            $envContents
        );

        // Write the updated .env file
        file_put_contents($envFile, $envContents);
    }
}
