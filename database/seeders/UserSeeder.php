<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Hunter Zemlak PhD', 'email' => 'admin@test.com', 'password' => '$2y$12$z9X7VH552Pheh2704xDFHe4b4kjUVjRAjGUiOTeB5tTS8vggpZyGG', 'created_at' => '2026-04-16 10:16:35'],
            ['id' => 2, 'name' => 'Zetta Streich', 'email' => 'seller@test.com', 'password' => '$2y$12$rdbY0IkgHdAwpHaJf1mXhON4F1utJxUXn8Su2GYZXPUt4dqdotpbG', 'created_at' => '2026-04-16 10:16:35'],
            ['id' => 3, 'name' => 'Samson Ullrich', 'email' => 'anna70@example.com', 'password' => '$2y$12$3lrAb9hMLpjf7BESWi9sCuAvTHMkbCG5.hhTrDQArHFe7ZfDIFHGi', 'created_at' => '2026-04-16 10:16:35'],
            ['id' => 4, 'name' => 'Holden Rogahn', 'email' => 'chaag@example.com', 'password' => '$2y$12$OJfvyphf2iPk5W6MkQCDXurkybZMBJkxhDQMyioHhWXhaUh/c4EBq', 'created_at' => '2026-04-16 10:16:36'],
            ['id' => 5, 'name' => 'Linnea Wyman', 'email' => 'archibald69@example.org', 'password' => '$2y$12$WnNv.uXes1Og6AlomkmVseDWTVNcJ6c.v6bq9jWGODZZUIqs6SO1e', 'created_at' => '2026-04-16 10:16:36'],
            ['id' => 6, 'name' => 'Stefan Botsford', 'email' => 'alyce.toy@example.com', 'password' => '$2y$12$6FPQlfoLDdFgVJAdQi9cN.L5RrvvW0TNPjmpsXaDnsxKMik4j9oD6', 'created_at' => '2026-04-16 10:16:36'],
            ['id' => 7, 'name' => 'Prof. Danny Jacobson IV', 'email' => 'harber.madie@example.com', 'password' => '$2y$12$PNamKV1BKjtsgsEo6ZmlnOsKtvFY.extVWtUGvGE.Ix3xRzEtUp7K', 'created_at' => '2026-04-16 10:16:37'],
            ['id' => 8, 'name' => 'Alexis Jaskolski', 'email' => 'grant.nathan@example.com', 'password' => '$2y$12$hpJyytTIHOkM.mfwlCtumuYvApqw7ms3o6uKHTNsXRci9qh45DniW', 'created_at' => '2026-04-16 10:16:37'],
            ['id' => 9, 'name' => 'Cecelia McKenzie', 'email' => 'goodwin.victoria@example.net', 'password' => '$2y$12$b1gVpd3OrwXK8w6WSF7a5Ohww/r/yGRbVUxKD35onV21NWFghy8Je', 'created_at' => '2026-04-16 10:16:37'],
            ['id' => 10, 'name' => 'Ms. Selena Prosacco Sr.', 'email' => 'pagac.melvin@example.com', 'password' => '$2y$12$iLTGCOFqJaHyKp4T81lRRuDw.zrJFIR3p.4xtvWBqkohvXiofxBxW', 'created_at' => '2026-04-16 10:16:38'],
            ['id' => 11, 'name' => 'Dr. Lionel Jacobi I', 'email' => 'crist.eudora@example.net', 'password' => '$2y$12$kv4Gl7P4RcYKc6eovTixU.pIugMdg/JN1.ZIVYvGQeAmNprjubB8K', 'created_at' => '2026-04-16 10:16:38'],
            ['id' => 12, 'name' => 'Maymie Simonis Sr.', 'email' => 'archibald.lemke@example.com', 'password' => '$2y$12$OXj8VqE/rW0h04tgbkXIqOmmptuEbOVHtFDv7oPRBD38g5VlpItFO', 'created_at' => '2026-04-16 10:16:38'],
            ['id' => 13, 'name' => 'Kayleigh Koelpin', 'email' => 'graciela44@example.org', 'password' => '$2y$12$j0bz7lCgmwbIrg96Aj1.L.iGmow2O7w498vJKg/vlW.MJ/686nVaG', 'created_at' => '2026-04-16 10:16:39'],
            ['id' => 14, 'name' => 'Addie Leuschke', 'email' => 'sophia.veum@example.net', 'password' => '$2y$12$3kdIeOnhE/FUe2e3kGi5H.5EMtqu71erly6hgwM3fvX9u3.g/dD02', 'created_at' => '2026-04-16 10:16:39'],
            ['id' => 15, 'name' => 'Shannon Corwin', 'email' => 'leonora.metz@example.org', 'password' => '$2y$12$MhWdTQHNCHPR4DH8UksSSufwnn9vMaHys4yHhrQ39XX36u/t0KALy', 'created_at' => '2026-04-16 10:16:39'],
            ['id' => 16, 'name' => 'Macey Feil I', 'email' => 'emie.nicolas@example.net', 'password' => '$2y$12$JiA5VU1mBU73Pkzpt4A8dehr128YLtin7W2kkfJ8aem6tN52t0IMW', 'created_at' => '2026-04-16 10:16:40'],
            ['id' => 17, 'name' => 'Robb Conn', 'email' => 'lueilwitz.reinhold@example.net', 'password' => '$2y$12$jQMl6BW3Ju.GHeHYdziF6eRAFPPoGc.LqbO9Y.FpZOYYzzZyM/w8O', 'created_at' => '2026-04-16 10:16:40'],
            ['id' => 18, 'name' => 'Cheyanne Strosin', 'email' => 'vgulgowski@example.net', 'password' => '$2y$12$F2mafjVuYjbXBmuD3thQxunybdKwn7VNVYAyKe26/XKJbjmZac3I.', 'created_at' => '2026-04-16 10:16:40'],
            ['id' => 19, 'name' => 'Mr. Izaiah Lubowitz PhD', 'email' => 'alyce73@example.org', 'password' => '$2y$12$bPZAv0OyoFMqT/BfXBtfvOQWYLit96Pqyzzl2n.5NQKqfbPcs6ytu', 'created_at' => '2026-04-16 10:16:41'],
            ['id' => 20, 'name' => 'Mrs. Harmony Osinski', 'email' => 'customer@test.com', 'password' => '$2y$12$Jr5tnDaWQBX9VlFfKM19denffvzocqt9KesGlCINdwrgkH6OeWiZu', 'created_at' => '2026-04-16 10:16:41'],
            ['id' => 21, 'name' => 'Abood1290', 'email' => 'abood@test.com', 'password' => '$2y$12$j1vPnTY/SSnULmSeL6hxtOxjMm.md1Ak16ut0BAKBKfS2WyMNeDhW', 'created_at' => '2026-04-23 08:17:05'],
        ];
        DB::table('users')->insert($users);

        $modelRoles = [
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 1], // Admin
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 20], // Customer
        ];
        
        // Sellers
        $sellerIds = [2, 3, 5, 6, 7, 8, 9, 11, 12, 13, 15, 16, 17, 18, 19];
        foreach ($sellerIds as $id) {
            $modelRoles[] = ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => $id];
        }
        DB::table('model_has_roles')->insert($modelRoles);
    }
}