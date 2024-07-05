<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Stock extends AbstractMigration
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
        $stock = $this->table('stock', ['id' => false, 'primary_key' => ['id']]);

        $stock
            ->addColumn('id', 'integer', ['signed' => false, 'identity' => true])
            ->addColumn('product_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('price', 'double', ['null' => false])
            ->addColumn('quantity', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('status', 'integer', ['default' => 1, 'null' => false])
            ->create();

        // relationships
        $stock->addForeignKey('product_id', 'product', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }
}
