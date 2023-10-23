<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('admins')->truncate();

        $adminRecords = [
            ['name' => 'Administrator 1', 'type' => 'admin', 'vendor_id' => 0, 'phone' => '1234567890', 'email' => 'admin1@admin.com', 'password' => '$2y$10$mj5A3e2PlkfX3E923DpvLuXnmqYZWzW6wE55AnKill6qBqtqLPFq2', 'image' => '', 'status' => 1],
            ['name' => 'Administrator 2', 'type' => 'admin', 'vendor_id' => 0, 'phone' => '1234567890', 'email' => 'admin2@admin.com', 'password' => '$2y$10$QB1WnJfeL5bCuLt.g9c44eH6Pj9Ttuu38XrCJuO1r4ndUeQvAUFFO', 'image' => '', 'status' => 0],
            ['name' => 'Sub Admin 1', 'type' => 'sub-admin', 'vendor_id' => 0, 'phone' => '1234567890', 'email' => 'subadmin1@admin.com', 'password' => '$2y$10$h55SDKpwbjlR6JGAxexF2OW7dy01fvjoFyUK9Qc..mTyVqJSyTvhm', 'image' => '', 'status' => 1],
            ['name' => 'Sub Admin 2', 'type' => 'sub-admin', 'vendor_id' => 0, 'phone' => '1234567890', 'email' => 'subadmin2@admin.com', 'password' => '$2y$10$5ZbzIgqxmtwYtE8XEB8iKe6J10znLhSfLvW7GwrBztz56JDagK6l2', 'image' => '', 'status' => 0],
            ['name' => 'Vendor 1', 'type' => 'vendor', 'vendor_id' => 1, 'phone' => '1234567890', 'email' => 'vendor1@vendor.com', 'password' => '$2y$10$AL/yA3beIWWLCHzOHWo41OopFKFtWq5PBJzNL.jqGi8/Gy7GujJNG', 'image' => '', 'status' => 1],
            ['name' => 'Vendor 2', 'type' => 'vendor', 'vendor_id' => 2, 'phone' => '1234567890', 'email' => 'vendor2@vendor.com', 'password' => '$2y$10$amobMG8JNrEZ5yOl807sjeByRNkBT6H9K2/0kkIkDxjqaa/uh3csC', 'image' => '', 'status' => 0],
        ];

        // DB::table('admins')->insert($adminRecords);

        foreach ($adminRecords as $key => $record)
        {
            Admin::create($record);
        }
    }
}
