<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'UserTypeSeeder'
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
        $data = [
            [
                'fname' => 'Admin',
                'lname' => 'User',
                'email' => 'admin@elan.com',
                'mobile' => '0701234567',
                'username' => 'admin',
                'password' => 'admin123',
                'status' => 1,
                'user_type_id' => 1, // Admin type
                'address_number' => '123',
                'address_street' => 'Main Street',
                'address_city' => 'Colombo',
                'image_path' => null
            ],
            [
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'john.doe@email.com',
                'mobile' => '0769876543',
                'username' => 'johndoe',
                'password' => 'password123',
                'status' => 1,
                'user_type_id' => 2, // User type
                'address_number' => '456',
                'address_street' => 'Park Avenue',
                'address_city' => 'Kandy',
                'image_path' => null
            ]
        ];

        $table = $this->table('user');
        $table->insert($data)->save();
    }
}
