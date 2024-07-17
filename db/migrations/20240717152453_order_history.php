<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class OrderHistory extends AbstractMigration
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
        $order_history = $this->table('order_history', ['id' => false, 'primary_key' => ['oh_id']]);

        $order_history
            ->addColumn('oh_id', 'integer', ['signed' => false, 'identity' => true])
            ->addColumn('order_id', 'text', ['null' => false])
            ->addColumn('order_date', 'datetime', ['null' => false])
            ->addColumn('amount', 'double', ['null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
            ->create();

        // relationships
        $order_history->addForeignKey('user_id', 'user', 'user_id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }
}
