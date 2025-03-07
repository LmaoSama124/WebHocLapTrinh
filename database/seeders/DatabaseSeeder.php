<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Admin::create([
    'username' => 'admin',
    'password' => Hash::make('admin@123'),
]);
