<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $userData = [
            'email' => 'ya.latreche@esi-sba.dz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ];

        $userInformationData = [
            'first_name' => 'Yassine',
            'last_name' => 'Latreche',
            'phone_number' => 'Latreche',
            'position_id' => '1',
        ];

        $user->name = $userInformationData['first_name'].' '.$userInformationData['last_name'];
        $user->email = $userData['email'];
        $user->email_verified_at = $userData['email_verified_at'];
        $user->password = $userData['password'];

        $user->save();

        $userInformation = new UserInformation();

        $userInformation->first_name = $userInformationData['first_name'];
        $userInformation->last_name = $userInformationData['last_name'];
        $userInformation->phone_number = $userInformationData['phone_number'];
        $userInformation->user_id = $user->id;
        $userInformation->position_id = $userInformationData['position_id'];

        $userInformation->save();
    }
}
