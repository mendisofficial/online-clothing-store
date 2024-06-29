<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserTable extends AbstractMigration
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
        $table = $this->table('user');

        // add the columns
        $table->addColumn('user_id', 'integer',['auto_increment' => true, 'notnull' => true]);
        $table->addColumn('fname', 'string', ['limit' => 20, 'notnull' => true]);
        $table->addColumn('lname', 'string', ['limit' => 20, 'notnull' => true]);
        $table->addColumn('email', 'string', ['limit' => 100, 'notnull' => true]);
        $table->addColumn('mobile', 'string', ['limit' => 10, 'notnull' => true]);
        $table->addColumn('username', 'string', ['limit' => 20, 'notnull' => true]);
        $table->addColumn('password', 'string', ['limit' => 45, 'notnull' => true]);
        $table->addColumn('status', 'integer', ['default' => 1, 'notnull' => true]);
        $table->addColumn('user_type_id', 'integer', ['notnull' => true]);

        // relationships
        $table->addForeignKey('user_type_id', 'user_type', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);
    }
}
