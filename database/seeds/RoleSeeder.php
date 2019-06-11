
<?php

use Illuminate\Database\Seeder;
use App\model\admin\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1="user";
        $type2="vendor";
        Role::create([
            'name'=>$type1,
            'created_at'=>'2018-01-12 03:33:57',
        ]);
        Role::create([
            'name'=>$type2,
            'created_at'=>'2018-01-15 03:33:57',
        ]);

    }
}