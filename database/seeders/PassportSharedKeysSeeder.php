<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

class PassportSharedKeysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $client = new ClientRepository();
        Tenant::all()->runForEach(function () use ($client){
            Artisan::call('passport:client');
            // $client->createPasswordGrantClient(null, 'Default password grant client', config('passport.redirect'));
            // $client->createPersonalAccessClient(null, 'Default personal access client', config('passport.redirect'));
        });
        // $client->createPasswordGrantClient(null, 'Default password grant client', config('passport.redirect'));
    }
}
