<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Size extends AbstractMigration
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
        $size = $this->table('size', ['id' => false, 'primary_key' => ['id']]);

        $size
            ->addColumn('id', 'integer', ['signed' => false, 'identity' => true])
            ->addColumn('name', 'string', ['limit' => 20, 'null' => false])
            ->create();
    }
}
