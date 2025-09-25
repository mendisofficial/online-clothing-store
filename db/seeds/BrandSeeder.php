<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class BrandSeeder extends AbstractSeed
{
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
        $data = [
            ['name' => 'Nike'],
            ['name' => 'Adidas'],
            ['name' => 'Puma'],
            ['name' => 'Levi\'s'],
            ['name' => 'Zara']
        ];

        $table = $this->table('brand');
        $table->insert($data)->save();
    }
}
