<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://eg.jumia.is/NpOEci21UuBXfueRONp5JtKTn2c=/fit-in/680x680/filters:fill(white)/product/09/56701/1.jpg?7035',
            'title' => 'Wiikii Shose',
            'price' => 200,
            'productType' => 'sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://i3.stycdn.net/images/article/adidas/so49013/adidas-dragon-so49013-2-0.jpg',
            'title' => 'Adidas Shose',
            'price' => 360,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://vb.elmstba.com/imgcache/almstba.com_1366396863_808.jpg',
            'title' => 'Nike Air Max Shose',
            'price' => 380,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://www.almrsal.com/wp-content/uploads/2014/03/reebok-sport-shes.jpg',
            'title' => 'Reebok Sport Shose',
            'price' => 410,
            'productType' => 'sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://cf1.s3.souqcdn.com/item/2016/11/08/11/62/02/03/item_XL_11620203_17350931.jpg',
            'title' => 'Classic White Shose',
            'price' => 320,
            'productType' => 'sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://www.arabmersal.net/vb/imgcache/21754.imgcache.jpg',
            'title' => 'Nike Smooth Shose',
            'price' => 330,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://www.thaqafnafsak.com/wp-content/uploads/2015/10/%D9%83%D9%88%D8%AA%D8%B4%D9%8A%D8%A7%D8%AA-2016-%D8%AB%D9%82%D9%81-%D9%86%D9%81%D8%B3%D9%83-6.jpg',
            'title' => 'Beautiful High Up Shose',
            'price' => 390,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://cf2.s3.souqcdn.com/item/2017/12/05/28/77/64/63/item_XL_28776463_80906077.jpg',
            'title' => 'Ring Shose',
            'price' => 320,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://www.r-x0.com//HLIC/fc813903647f3490253def4a55e08407.jpg',
            'title' => 'Nice Shose',
            'price' => 340,
            'productType' => 'sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://vb.elmstba.com/imgcache/almastba.com_1392605306_226.jpg',
            'title' => 'Nike Sporting Wear',
            'price' => 400,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://img.roro44.net/imgcache/2016/03/337235.jpg',
            'title' => 'Adidas Sporting Wear',
            'price' => 410,
            'productType' => 'sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://cdn1.uksoccershop.com/images/as-roma-2015-2016-nike-core-hoody-red.jpg',
            'title' => 'Nike AS Roma',
            'price' => 430,
            'productType' => 'sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://ae01.alicdn.com/kf/HTB19U4MaeYCK1JjSZFtq6zcCVXat/2017-Musim-Dingin-Jaket-Pria-Termal-pria-mantel-hangat-merah-biru-hitam-anti-fouling-Tahan-Air.jpg_640x640.jpg',
            'title' => 'Nice Jaket',
            'price' => 450,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://gloimg.rowcdn.com/ROSE/pdm-product-pic/Clothing/2016/08/01/source-img/20160801095832_50542.jpg?01',
            'title' => 'Wonderful Black Wear',
            'price' => 430,
            'productType' => 'normal'
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://upload.7hob.com/Photo/7hob.com1366236857885.jpg',
            'title' => 'Puma Red Wear',
            'price' => 230,
            'productType' => 'sale'
        ]);
        $product->save(); 
    }
}
