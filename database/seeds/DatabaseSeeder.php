<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "CPU",
                "/image/cpu.png",
                "中央処理装置",
                "40000"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "マザーボード",
                "/image/motherboard.png",
                "電子回路基板",
                "12700"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "メモリー",
                "/image/memory.png",
                "メモリー",
                "18549"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "ハードディスク",
                "/image/HDD.png",
                "補助記憶装置",
                "8275"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "SSD",
                "/image/SSD.jpg",
                "補助記憶装置",
                "10592"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "モニター",
                "/image/monitor.png",
                "液晶モニター",
                "29800"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "ドライヴ",
                "/image/drive.png",
                "DVDドライヴ",
                "12000"
            ]);
        DB::insert("insert into items(name,img,description,price) values(?,?,?,?)",
            [
                "OS",
                "/image/OS.png",
                "Windows",
                "12980"
            ]);
    }
}
