<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Cart extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // create the table
        $cart = $this->table('cart', ['id' => false, 'primary_key' => ['cart_id']]);

        $cart
            ->addColumn('cart_id', 'integer', ['signed' => false, 'identity' => true])
            ->addColumn('cart_quantity', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('stock_id', 'integer', ['signed' => false, 'null' => false])
            ->create();

        // relationships
        $cart->addForeignKey('user_id', 'user', 'user_id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('stock_id', 'stock', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }
}
