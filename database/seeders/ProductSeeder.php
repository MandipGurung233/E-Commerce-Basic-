<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        [
            'name' => 'Vest',
            'price' => '1000',
            'category' => 'Kids',
            'description' => 'Cool for summmer, make your kid look like a summer',
            'gallery'=>'https://i.pinimg.com/originals/70/69/08/706908198bd2c43432002a567e6f229b.jpg',
            
        ],
        [
            'name' => 'T-shirt and Pant',
            'price' => '2000',
            'category' => 'adult',
            'description' => 'Summer Fashio, makes you look cool',
            'gallery'=>'https://www.imnepal.com/wp-content/uploads/2017/09/Top-Bottom-Sets-T-Shirts-and-Capris-Set-baby-boy-dress.jpg',
            
        ],
        [
            'name' => 'Lehanga',
            'price' => '20000',
            'category' => 'Female',
            'description' => 'Girly look',
            'gallery'=>'https://m.media-amazon.com/images/I/611qWhZKTWL._AC_UL1500_.jpg',
        ],
        [
            'name' => 'Shirt',
            'price' => '1500',
            'category' => 'Kids',
            'description' => 'Get your looks',
            'gallery'=>'https://static-01.daraz.com.bd/p/mdc/a5af42578e6c44812e85ffdf2286e446.jpg',
            
        ],
        [
            'name' => 'Barbie',
            'price' => '2000',
            'category' => 'Kids',
            'description' => 'Dolly look',
            'gallery'=>'https://stylesatlife.com/wp-content/uploads/2018/02/Halter-neck-Dress.jpg.webp',
            
        ],
    
    
        ]);
    
    }
}
