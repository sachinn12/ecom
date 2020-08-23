<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'id'=>1,'name'=>'admin','type'=>'admin','mobile'=>'9849122179','email'=>'admin@gmail.com',
                'password'=>'$2y$10$NXGJuPkT/MFNhKkBxCL2TeZDCuRh.7MVi/BYtN6mg09g.1rzJaSoG','image'=>'','status'=>'1'
            ],
            [
                'id'=>2,'name'=>'admin1','type'=>'subadmin','mobile'=>'9849122179','email'=>'admin1@gmail.com',
                'password'=>'$2y$10$NXGJuPkT/MFNhKkBxCL2TeZDCuRh.7MVi/BYtN6mg09g.1rzJaSoG','image'=>'','status'=>'1'
            ],
            [
                'id'=>3,'name'=>'admin2','type'=>'subadmin','mobile'=>'9849122179','email'=>'admin2@gmail.com',
                'password'=>'$2y$10$NXGJuPkT/MFNhKkBxCL2TeZDCuRh.7MVi/BYtN6mg09g.1rzJaSoG','image'=>'','status'=>'1'
            ],
            [
                'id'=>4,'name'=>'admin3','type'=>'subadmin','mobile'=>'9849122179','email'=>'admin3@gmail.com',
                'password'=>'$2y$10$NXGJuPkT/MFNhKkBxCL2TeZDCuRh.7MVi/BYtN6mg09g.1rzJaSoG','image'=>'','status'=>'1'
            ],
        ];

        // foreach ($adminRecords as $key => $record){
        //     \App\Admin::create($record);
        // }

        DB::table('admins')->insert($adminRecords);
    
    }
}
