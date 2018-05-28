<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'number' => $faker->randomElement($array = array('13','12','13','17','14','13','11','10','15','19','13','22','17','35','14','13','12','14','25','12')),
        'project_name' => $faker->randomElement($array = array('FM276','FM287','FM276','FM233','FM276','FM287','FM276','FM233','FM274','FM287','FM274','FM233','FM274','FM284','FM276','FM233','FM274','FM287','FM274','FM233')),
        'version' => $faker->randomElement($array = array('U07-001','U07-002','U02','U03','U07-001','U07-002','U05','U03','U07-001','U07-002','U03','U03','U07-001','U07-001','U02','U02','U07-001','U07-001','U03','U03')),
        'specification' => $faker->randomElement($array = array('DIP','PLCC','BGA','SOP','PLCC','DIP','QFP','BGA','PLCC','PLCC','DIP','QFP','BGA','PLCC','PLCC','DIP','QFP','BGA','SOP','PLCC')),
        'package' => $faker->randomElement($array = array('LQFP80','HZ','HZ','HZ','WU','HZ','WU','WU','WU','HZ','WU','HZ','WU','HZ','WU','HZ','WU','HZ','WU','WU')),
        'step' => $faker->randomElement($array = array('晶圆','半成品','成品')),
        'special' => $faker->randomElement($array = array('N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A','N/A')),
        'HSF' => $faker->randomElement($array = array('kelu','xielin','sida','heilongdian','kelu','xielin','sida','heilongdian','kelu','xielin','sida','sida','kelu','xielin','sida','sida','kelu','xielin','sida','xielin')),
        'batch' => $faker->randomElement($array = array('D56016','D56716','D56716','D56317','D56711','D56713','D54716','D55716','D38716','D56716','D56716','D56716','D56716','D56716','D56716','D56712','D47716','D53416','D54416','D56710')),
        'grade' => $faker->randomElement($array = array('High','Mid','Mid','Super','High','Mid','Mid','Super','High','Mid','Mid','Super','High','Mid','Low','Super','High','Mid','Mid','Super')),
        'packing' => $faker->randomElement($array = array('Std','Adv','Std','Adv','Std','Adv','Std','Std','Std','Adv','Std','Std','Std','Adv','Std','Std','Std','Adv','Std','Adv')),
        'warehouse_id' =>random_int(1,10),
        'inventory_amount' => random_int(0,100),//库存数量
        'DIE_amount' => random_int(0,100),//DIE数
        'manufacture_date' => $faker->date($min='2013-01-01'),//生产日期
        'frozen' => $faker->boolean(),//冻结
        'sale' => $faker->boolean(),//销售
        'manufacture' =>$faker->boolean(),//生产
        'first_entry_warehouse' => $faker->date($min='2015-01-01'),//首次入库
        'attribute' => $faker->realText($maxNbChars = 20, $indexSize = 1),//属性
        'remark' => $faker->realText($maxNbChars = 20, $indexSize = 1),//备注
    ];
});
