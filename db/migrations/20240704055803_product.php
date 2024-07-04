<?php

declare(strict_types=1);

use Phinx\Db\Action\AddColumn;
use Phinx\Migration\AbstractMigration;

final class Product extends AbstractMigration
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
        $product = $this->table('product', ['id' => false, 'primary_key' => ['id']]);

        $product
            ->addColumn('id', 'integer', ['signed' => false, 'identity' => true])
            ->addColumn('name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('description', 'text', ['null' => false])
            ->addColumn('image_path', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('brand_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('category_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('size_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('color_id', 'integer', ['signed' => false, 'null' => false])
            ->save();

        // relationships
        $product->addForeignKey('brand_id', 'brand', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('category_id', 'category', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('size_id', 'size', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('color_id', 'color', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->save();
    }
}
