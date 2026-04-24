<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryAndProductSeeder extends Seeder
{
    public function run()
    {
        // 1. Categories
        $categories = [
            ['id' => 1, 'name' => 'Officiis', 'created_at' => '2026-04-16 10:16:41'],
            ['id' => 2, 'name' => 'Sunt', 'created_at' => '2026-04-16 10:16:41'],
            ['id' => 3, 'name' => 'Error', 'created_at' => '2026-04-16 10:16:41'],
            ['id' => 4, 'name' => 'Et', 'created_at' => '2026-04-16 10:16:41'],
            ['id' => 5, 'name' => 'Molestias', 'created_at' => '2026-04-16 10:16:41'],
        ];
        DB::table('categories')->insert($categories);

        // 2. Products
        $products = [
            ['id' => 1, 'seller' => 3, 'name' => 'Hic nihil est', 'price' => 119.17, 'quantity' => 23, 'description' => 'Pariatur ea et quia laborum quas optio eveniet est voluptatem.', 'status' => 'active'],
            ['id' => 2, 'seller' => 15, 'name' => 'Quia maiores eos', 'price' => 431.13, 'quantity' => 12, 'description' => 'Libero ipsa dolores provident voluptatem et cum error molestiae explicabo similique iusto autem.', 'status' => 'active'],
            ['id' => 3, 'seller' => 13, 'name' => 'Tempore excepturi voluptatem', 'price' => 217.93, 'quantity' => 66, 'description' => 'Mollitia aut soluta odio officia accusantium dolor doloribus optio dolore quo sint enim quo.', 'status' => 'active'],
            ['id' => 4, 'seller' => 5, 'name' => 'Est voluptatem asperiores', 'price' => 400.09, 'quantity' => 44, 'description' => 'Incidunt laborum odio aperiam aliquid non at aperiam voluptas nam numquam.', 'status' => 'active'],
            ['id' => 5, 'seller' => 10, 'name' => 'Et alias aliquam', 'price' => 357.04, 'quantity' => 70, 'description' => 'Eveniet ducimus excepturi nisi voluptas et consequatur non fugiat debitis aut ut recusandae cupiditate.', 'status' => 'active'],
            ['id' => 6, 'seller' => 12, 'name' => 'Autem facere ipsum', 'price' => 302.09, 'quantity' => 97, 'description' => 'Voluptas laudantium iusto quis non hic corporis et assumenda nulla.', 'status' => 'active'],
            ['id' => 7, 'seller' => 20, 'name' => 'Enim aspernatur modi', 'price' => 80.96, 'quantity' => 7, 'description' => 'Quisquam cumque laboriosam exercitationem unde ea esse assumenda porro ipsa.', 'status' => 'active'],
            ['id' => 8, 'seller' => 5, 'name' => 'Suscipit ut quaerat', 'price' => 107.08, 'quantity' => 30, 'description' => 'Ratione dolorem dolor dolor dolor nihil incidunt.', 'status' => 'active'],
            ['id' => 9, 'seller' => 20, 'name' => 'Qui aliquam facere', 'price' => 198.33, 'quantity' => 58, 'description' => 'Quam sunt esse voluptatum perspiciatis architecto atque.', 'status' => 'active'],
            ['id' => 10, 'seller' => 18, 'name' => 'Consequatur nihil pariatur', 'price' => 390.36, 'quantity' => 69, 'description' => 'Id fuga ea tenetur quisquam deserunt facilis earum enim fuga qui sit qui quibusdam.', 'status' => 'active'],
            ['id' => 11, 'seller' => 4, 'name' => 'Iure explicabo reprehenderit', 'price' => 248.21, 'quantity' => 77, 'description' => 'Nesciunt aliquid aperiam quia quod quo atque aspernatur voluptatum et consequatur tempore dignissimos.', 'status' => 'active'],
            ['id' => 12, 'seller' => 9, 'name' => 'Eveniet laboriosam vel', 'price' => 449.34, 'quantity' => 40, 'description' => 'Quia consequuntur ipsa similique et unde eius error quis dicta eveniet molestiae facere in.', 'status' => 'active'],
            ['id' => 13, 'seller' => 10, 'name' => 'Amet quam qui', 'price' => 493.08, 'quantity' => 40, 'description' => 'Qui distinctio voluptas eius quo et eligendi.', 'status' => 'active'],
            ['id' => 14, 'seller' => 18, 'name' => 'Unde quisquam consequatur', 'price' => 499.43, 'quantity' => 65, 'description' => 'Unde et est rerum culpa voluptate hic cum assumenda.', 'status' => 'active'],
            ['id' => 15, 'seller' => 14, 'name' => 'Vitae est qui', 'price' => 133.64, 'quantity' => 26, 'description' => 'Sint qui accusantium vel qui ut ipsa.', 'status' => 'active'],
            ['id' => 16, 'seller' => 14, 'name' => 'Doloremque tempore commodi', 'price' => 339.11, 'quantity' => 98, 'description' => 'Cum iure voluptatum illo nisi nesciunt et porro.', 'status' => 'active'],
            ['id' => 17, 'seller' => 9, 'name' => 'Magnam dolor similique', 'price' => 159.84, 'quantity' => 26, 'description' => 'Commodi eum laborum eum consequuntur cumque in amet assumenda ducimus iste.', 'status' => 'active'],
            ['id' => 18, 'seller' => 1, 'name' => 'Iste ipsa explicabo', 'price' => 171.02, 'quantity' => 61, 'description' => 'Quos dolore eum nostrum et possimus quod.', 'status' => 'active'],
            ['id' => 19, 'seller' => 17, 'name' => 'Est rerum perferendis', 'price' => 147.38, 'quantity' => 31, 'description' => 'Magnam et fuga temporibus veniam tenetur odio non iure quaerat praesentium ut.', 'status' => 'active'],
            ['id' => 20, 'seller' => 1, 'name' => 'Ex nam qui', 'price' => 78.01, 'quantity' => 10, 'description' => 'Ut non numquam recusandae aliquam eum rerum reiciendis laborum beatae consequatur aliquid recusandae.', 'status' => 'active'],
            ['id' => 21, 'seller' => 1, 'name' => 'Qui sit recusandae', 'price' => 193.68, 'quantity' => 92, 'description' => 'Ut at quidem aliquam facilis ea vitae quod placeat et voluptatem quidem.', 'status' => 'active'],
            ['id' => 22, 'seller' => 16, 'name' => 'Consequatur suscipit vitae', 'price' => 259.17, 'quantity' => 80, 'description' => 'Unde tenetur dolor voluptatem facere voluptatem omnis amet.', 'status' => 'active'],
            ['id' => 23, 'seller' => 18, 'name' => 'Neque non molestiae', 'price' => 161.60, 'quantity' => 22, 'description' => 'Voluptatem ut odit culpa qui fuga modi dolor consectetur explicabo.', 'status' => 'active'],
            ['id' => 24, 'seller' => 5, 'name' => 'A mollitia qui', 'price' => 148.40, 'quantity' => 11, 'description' => 'Veritatis velit quis doloribus est beatae aspernatur.', 'status' => 'active'],
            ['id' => 25, 'seller' => 15, 'name' => 'Sint expedita et', 'price' => 156.65, 'quantity' => 69, 'description' => 'Est vel quibusdam commodi alias temporibus repellat dignissimos quis explicabo.', 'status' => 'active'],
            ['id' => 26, 'seller' => 13, 'name' => 'Asperiores qui culpa', 'price' => 192.62, 'quantity' => 73, 'description' => 'Culpa in modi porro doloribus voluptatem ut tempore dicta alias similique eaque.', 'status' => 'active'],
            ['id' => 27, 'seller' => 15, 'name' => 'Qui non qui', 'price' => 170.34, 'quantity' => 39, 'description' => 'Nesciunt quos repellat non corporis consectetur ex laudantium adipisci.', 'status' => 'active'],
            ['id' => 28, 'seller' => 18, 'name' => 'Sed repellendus officia', 'price' => 28.67, 'quantity' => 12, 'description' => 'Voluptas fugit id ut minima rem voluptas.', 'status' => 'active'],
            ['id' => 29, 'seller' => 11, 'name' => 'Veritatis earum sed', 'price' => 198.76, 'quantity' => 40, 'description' => 'Nihil amet qui quo nulla quisquam asperiores dicta rerum voluptas hic.', 'status' => 'active'],
            ['id' => 30, 'seller' => 1, 'name' => 'Libero optio ut', 'price' => 260.19, 'quantity' => 88, 'description' => 'Quis harum in at minus est aliquam animi voluptas.', 'status' => 'active'],
            ['id' => 31, 'seller' => 17, 'name' => 'Accusantium exercitationem facilis', 'price' => 108.81, 'quantity' => 98, 'description' => 'Consequatur facilis in dolor unde est excepturi occaecati magnam nobis sed quia quo.', 'status' => 'active'],
            ['id' => 32, 'seller' => 13, 'name' => 'Debitis excepturi ad', 'price' => 438.42, 'quantity' => 98, 'description' => 'Exercitationem eaque sint molestiae amet ea corporis accusantium dolore molestiae quisquam magni.', 'status' => 'active'],
            ['id' => 33, 'seller' => 13, 'name' => 'Eius cumque hic', 'price' => 87.90, 'quantity' => 58, 'description' => 'Quaerat numquam pariatur quisquam libero et molestiae dolorem dicta molestias inventore incidunt.', 'status' => 'active'],
            ['id' => 34, 'seller' => 1, 'name' => 'Molestiae soluta tempore', 'price' => 399.01, 'quantity' => 97, 'description' => 'Fugit inventore optio et numquam laborum repellat quia ullam architecto et et iure velit.', 'status' => 'active'],
            ['id' => 35, 'seller' => 9, 'name' => 'Eaque deserunt laudantium', 'price' => 315.56, 'quantity' => 79, 'description' => 'Provident veniam reprehenderit reprehenderit amet nobis non reprehenderit vero distinctio provident molestiae nihil delectus.', 'status' => 'active'],
            ['id' => 36, 'seller' => 16, 'name' => 'Nesciunt aut et', 'price' => 48.68, 'quantity' => 21, 'description' => 'Nesciunt labore quibusdam omnis recusandae corporis molestiae omnis eum eius.', 'status' => 'active'],
            ['id' => 37, 'seller' => 4, 'name' => 'Neque odit ut', 'price' => 152.75, 'quantity' => 12, 'description' => 'Deleniti dolor sint veritatis consequatur eligendi tempore aliquam saepe dolorum labore quia ut voluptates.', 'status' => 'active'],
            ['id' => 38, 'seller' => 10, 'name' => 'Cum maiores aliquid', 'price' => 109.55, 'quantity' => 62, 'description' => 'Error quasi neque sed odio molestiae reprehenderit architecto asperiores asperiores possimus commodi.', 'status' => 'active'],
            ['id' => 39, 'seller' => 19, 'name' => 'Laudantium quis sunt', 'price' => 291.10, 'quantity' => 66, 'description' => 'Sit expedita autem et cumque magnam excepturi expedita vel vero tempore est occaecati.', 'status' => 'active'],
            ['id' => 40, 'seller' => 8, 'name' => 'Eaque esse suscipit', 'price' => 334.32, 'quantity' => 75, 'description' => 'Vero iste blanditiis est omnis sequi molestias in cumque aut rerum quia iste.', 'status' => 'active'],
            ['id' => 41, 'seller' => 16, 'name' => 'Praesentium veniam consequatur', 'price' => 135.10, 'quantity' => 94, 'description' => 'Ab laborum et esse nisi maxime qui voluptatem assumenda dolores.', 'status' => 'active'],
            ['id' => 42, 'seller' => 5, 'name' => 'Qui ut aliquid', 'price' => 222.08, 'quantity' => 50, 'description' => 'Autem est odio velit aut illo laborum eum doloremque consequatur accusantium officiis tenetur minima.', 'status' => 'active'],
            ['id' => 43, 'seller' => 4, 'name' => 'Saepe velit quis', 'price' => 120.28, 'quantity' => 93, 'description' => 'Officiis quisquam aliquam qui est recusandae et corrupti perferendis veritatis ipsam molestiae.', 'status' => 'active'],
            ['id' => 44, 'seller' => 6, 'name' => 'Minima a voluptates', 'price' => 288.31, 'quantity' => 8, 'description' => 'Molestiae et quod non perferendis harum quis tempore nobis unde maxime.', 'status' => 'active'],
            ['id' => 45, 'seller' => 19, 'name' => 'Quisquam sint iure', 'price' => 234.66, 'quantity' => 22, 'description' => 'Sed eius qui nihil magnam tenetur soluta nihil quidem perferendis blanditiis.', 'status' => 'active'],
            ['id' => 46, 'seller' => 1, 'name' => 'Ea architecto quia', 'price' => 178.06, 'quantity' => 71, 'description' => 'Accusamus quam aperiam et ullam tempore laudantium quam ratione iste alias vel.', 'status' => 'active'],
            ['id' => 47, 'seller' => 8, 'name' => 'Eveniet sunt pariatur', 'price' => 22.99, 'quantity' => 9, 'description' => 'Ex excepturi inventore a quis eligendi et sint exercitationem harum sed.', 'status' => 'active'],
            ['id' => 48, 'seller' => 5, 'name' => 'Ut molestiae non', 'price' => 320.26, 'quantity' => 92, 'description' => 'Laborum amet quia saepe corporis aspernatur necessitatibus vero excepturi beatae omnis error nobis neque.', 'status' => 'active'],
            ['id' => 49, 'seller' => 20, 'name' => 'Et qui perferendis', 'price' => 227.33, 'quantity' => 34, 'description' => 'Maiores quo eum tenetur repudiandae temporibus nihil.', 'status' => 'active'],
            ['id' => 50, 'seller' => 6, 'name' => 'Consequuntur maiores nihil', 'price' => 390.89, 'quantity' => 41, 'description' => 'Velit eveniet dolorem odit animi quia molestiae saepe enim.', 'status' => 'active'],
        ];
        
        // Add timestamps to products
        $products = array_map(function($product) {
            $product['created_at'] = '2026-04-16 10:16:41';
            $product['updated_at'] = '2026-04-16 10:16:41';
            return $product;
        }, $products);

        DB::table('products')->insert($products);

        // 3. Category_Product Pivot
        $categoryProduct = [
            ['id' => 1, 'product_id' => 1, 'category_id' => 2], ['id' => 2, 'product_id' => 2, 'category_id' => 5],
            ['id' => 3, 'product_id' => 3, 'category_id' => 2], ['id' => 4, 'product_id' => 4, 'category_id' => 3],
            ['id' => 5, 'product_id' => 5, 'category_id' => 2], ['id' => 6, 'product_id' => 6, 'category_id' => 4],
            ['id' => 7, 'product_id' => 7, 'category_id' => 2], ['id' => 8, 'product_id' => 8, 'category_id' => 1],
            ['id' => 9, 'product_id' => 9, 'category_id' => 3], ['id' => 10, 'product_id' => 10, 'category_id' => 4],
            ['id' => 11, 'product_id' => 11, 'category_id' => 2], ['id' => 12, 'product_id' => 12, 'category_id' => 5],
            ['id' => 13, 'product_id' => 13, 'category_id' => 5], ['id' => 14, 'product_id' => 14, 'category_id' => 5],
            ['id' => 15, 'product_id' => 15, 'category_id' => 4], ['id' => 16, 'product_id' => 16, 'category_id' => 4],
            ['id' => 17, 'product_id' => 17, 'category_id' => 5], ['id' => 18, 'product_id' => 18, 'category_id' => 3],
            ['id' => 19, 'product_id' => 19, 'category_id' => 5], ['id' => 20, 'product_id' => 20, 'category_id' => 3],
            ['id' => 21, 'product_id' => 21, 'category_id' => 5], ['id' => 22, 'product_id' => 22, 'category_id' => 3],
            ['id' => 23, 'product_id' => 23, 'category_id' => 1], ['id' => 24, 'product_id' => 24, 'category_id' => 5],
            ['id' => 25, 'product_id' => 25, 'category_id' => 3], ['id' => 26, 'product_id' => 26, 'category_id' => 1],
            ['id' => 27, 'product_id' => 27, 'category_id' => 2], ['id' => 28, 'product_id' => 28, 'category_id' => 5],
            ['id' => 29, 'product_id' => 29, 'category_id' => 4], ['id' => 30, 'product_id' => 30, 'category_id' => 1],
            ['id' => 31, 'product_id' => 31, 'category_id' => 5], ['id' => 32, 'product_id' => 32, 'category_id' => 1],
            ['id' => 33, 'product_id' => 33, 'category_id' => 1], ['id' => 34, 'product_id' => 34, 'category_id' => 2],
            ['id' => 35, 'product_id' => 35, 'category_id' => 3], ['id' => 36, 'product_id' => 36, 'category_id' => 4],
            ['id' => 37, 'product_id' => 37, 'category_id' => 5], ['id' => 38, 'product_id' => 38, 'category_id' => 3],
            ['id' => 39, 'product_id' => 39, 'category_id' => 2], ['id' => 40, 'product_id' => 40, 'category_id' => 1],
            ['id' => 41, 'product_id' => 41, 'category_id' => 3], ['id' => 42, 'product_id' => 42, 'category_id' => 1],
            ['id' => 43, 'product_id' => 43, 'category_id' => 5], ['id' => 44, 'product_id' => 44, 'category_id' => 3],
            ['id' => 45, 'product_id' => 45, 'category_id' => 1], ['id' => 46, 'product_id' => 46, 'category_id' => 1],
            ['id' => 47, 'product_id' => 47, 'category_id' => 5], ['id' => 48, 'product_id' => 48, 'category_id' => 5],
            ['id' => 49, 'product_id' => 49, 'category_id' => 1], ['id' => 50, 'product_id' => 50, 'category_id' => 4],
        ];
        
        $categoryProduct = array_map(function($cp) {
            $cp['created_at'] = '2026-04-16 10:16:41';
            return $cp;
        }, $categoryProduct);

        DB::table('category_product')->insert($categoryProduct);
    }
}