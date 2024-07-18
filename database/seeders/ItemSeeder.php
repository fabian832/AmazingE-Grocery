<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
            'item_id' => '1',
            'item_name' => 'Bawang Goreng',
            'item_desc' => 'Bawang Goreng Siap Saji 100g dari Tangerang Selatan',
            'price' => 6000,
        ]);

        DB::table('items')->insert([
            'item_id' => '2',
            'item_name' => 'Torabika Cappuccino',
            'item_desc' => 'Torabika Cappuccino - 1 Renceng, berat 25 - 250 gram',
            'price' => 18000,
        ]);

        DB::table('items')->insert([
            'item_id' => '3',
            'item_name' => 'Tahu Bakso Siap Saji',
            'item_desc' => 'Tahu Bakso Enak, berat 200 gram',
            'price' => 10000,
        ]);

        DB::table('items')->insert([
            'item_id' => '4',
            'item_name' => 'Paket Sayur Sop',
            'item_desc' => 'Bumbu Racik Sayur Sop 1 sachet, Tomat, Kentang, Wortel, Buncis, Daun Bawang Seledri, & Kol',
            'price' => 8000,
        ]);

        DB::table('items')->insert([
            'item_id' => '5',
            'item_name' => 'Paket Tumis - Tauge',
            'item_desc' => 'Paket Tumis Buncis, Kangkung, Labu Siam, Tauge, & Kacang Panjang',
            'price' => 8000,
        ]);

        DB::table('items')->insert([
            'item_id' => '6',
            'item_name' => 'Sayur Parsley',
            'item_desc' => 'Sayur Parsley Fresh - HARGA PER @100gr',
            'price' => 6100,
        ]);

        DB::table('items')->insert([
            'item_id' => '7',
            'item_name' => 'Daun Pisang [1 kg]',
            'item_desc' => 'Tipe Produk : Daun Pisang. Packaging : Plastik. Berat : 1 kg / 250 gr. Pengiriman : dari Kota Tangerang',
            'price' => 11500,
        ]);

        DB::table('items')->insert([
            'item_id' => '8',
            'item_name' => 'Rumah Sayur Daun Ginseng [250 gram]',
            'item_desc' => 'Daun Ginseng dari Rumah Sayur. Bisa Kirim di Hari Yang Sama untuk Transaksi sebelum jam 13.00, dengan Instant atau Sameday',
            'price' => 4025,
        ]);

        DB::table('items')->insert([
            'item_id' => '9',
            'item_name' => 'Sayur pakis/ki choi',
            'item_desc' => 'Sayuran pakis cocok untuk campuran bubur pedas.Bisa juga di masak terasi atau bisa anda juga olah 
            sesuai selera anda.',
            'price' => 13000,
        ]);

        DB::table('items')->insert([
            'item_id' => '10',
            'item_name' => 'Paket sayur asem',
            'item_desc' => 'PAKET LENGKAP SAYUR ASAM ISI LENGKAP, PRAKTIS DAN HEMAT',
            'price' => 4000,
        ]);

        DB::table('items')->insert([
            'item_id' => '11',
            'item_name' => 'Siomak Sayur Kura kura',
            'item_desc' => 'Siomak Sayur Kura kura 1 kg.',
            'price' => 22800,
        ]);

        DB::table('items')->insert([
            'item_id' => '12',
            'item_name' => 'Daun Bawang Dengan Akar [250 gram]',
            'item_desc' => 'Tipe Produk : Daun Bawang Dengan Akar. Tekstur : -. Packaging : plastik. Berat : 250 gr / 1 kg',
            'price' => 5000,
        ]);

        DB::table('items')->insert([
            'item_id' => '13',
            'item_name' => 'Fresh Kunyit Segar Organik - Sayur Kendal - 250gr',
            'item_desc' => 'Kunyit yang disediakan Sayur Kendal , sudah melalui proses Quality Control untuk memastikan,
            pangan ini sudah dalam kualitas terbaik.',
            'price' => 5000,
        ]);

        DB::table('items')->insert([
            'item_id' => '14',
            'item_name' => 'Sayur Buncis Segar 100 gram',
            'item_desc' => 'Buncis dengan Berat: 100gr. Pengiriman: Setiap hari. Kondisi: Fresh',
            'price' => 5000,
        ]);

        DB::table('items')->insert([
            'item_id' => '15',
            'item_name' => 'Brussel sprout-sayur segar- 500gr',
            'item_desc' => 'BRUSSLE SPROUT FRESH',
            'price' => 75000,
        ]);

        DB::table('items')->insert([
            'item_id' => '16',
            'item_name' => 'Fresh Sawi Hijau Segar Organik - Sayur Kendal - 250gr',
            'item_desc' => 'Sawi Hijau yang disediakan Sayur Kendal , sudah melalui proses Quality Control untuk
            memastikan, pangan ini sudah dalam kualitas terbaik.',
            'price' => 4050,
        ]);

        DB::table('items')->insert([
            'item_id' => '17',
            'item_name' => 'Veggie salad',
            'item_desc' => 'Berisi beberapa jenis sayuran segar dan dilengkapi dengan dressing yang terbuat
            dari 100% bahan alami.',
            'price' => 3500,
        ]);

        DB::table('items')->insert([
            'item_id' => '18',
            'item_name' => 'Sayuran Wortel',
            'item_desc' => 'Sayuran Wortel / Wortel export / Wortel Segar - 250 gram',
            'price' => 5000,
        ]);

        DB::table('items')->insert([
            'item_id' => '19',
            'item_name' => 'Sayur segar bayam hijau',
            'item_desc' => 'Bayam segar -+ 200gr',
            'price' => 3400,
        ]);

        DB::table('items')->insert([
            'item_id' => '20',
            'item_name' => 'Tomat Sayur',
            'item_desc' => 'Tomat Sayur - 250gr untuk membuat sambal dan sebagai campuran masakan seperti capcay, tumisan serta sayur sop.',
            'price' => 3000,
        ]);
    }
}
