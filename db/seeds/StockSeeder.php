<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class StockSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'ProductSeeder'
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        // Get existing product IDs from database
        $pdo = $this->getAdapter()->getConnection();
        $stmt = $pdo->query("SELECT id FROM product ORDER BY id LIMIT 25");
        $productIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (empty($productIds)) {
            echo "No products found in database. Please run ProductSeeder first.\n";
            return;
        }

        $data = [];
        $prices = [
            29.99,
            34.99,
            129.99,
            89.99,
            24.99,
            32.99,
            39.99,
            99.99,
            79.99,
            19.99,
            27.99,
            35.99,
            109.99,
            69.99,
            22.99,
            89.99,
            94.99,
            25.99,
            119.99,
            39.99,
            19.99,
            24.99,
            59.99,
            79.99,
            29.99
        ];

        $quantities = [
            15,
            22,
            8,
            12,
            30,
            18,
            14,
            10,
            16,
            25,
            20,
            17,
            6,
            13,
            28,
            9,
            11,
            24,
            7,
            19,
            32,
            26,
            14,
            8,
            21
        ];

        // Create stock entries for each product
        for ($i = 0; $i < min(count($productIds), 25); $i++) {
            $data[] = [
                'product_id' => $productIds[$i],
                'price' => $prices[$i],
                'quantity' => $quantities[$i],
                'status' => 1
            ];
        }

        $table = $this->table('stock');
        $table->insert($data)->save();
    }
}
