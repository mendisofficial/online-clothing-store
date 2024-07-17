<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class OrderItems extends AbstractMigration
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
        $order_items = $this->table('order_items', ['id' => false, 'primary_key' => ['oi_id']]);

        $order_items
            ->addColumn('oi_id', 'integer', ['signed' => false, 'identity' => true])
            ->addColumn('oi_quantity', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('order_history_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('stock_id', 'integer', ['signed' => false, 'null' => false])
            ->create();

        // relationships
        $order_items
            ->addForeignKey('order_history_id', 'order_history', 'oh_id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('stock_id', 'stock', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }
}
