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
        // create the table with 'user_id' as the primary key
        $user = $this->table('user', ['id' => false, 'primary_key' => 'user_id']);

        // add the columns
        $user
            ->addColumn('user_id', 'integer', ['identity' => true, 'signed' => false, 'null' => false])
            ->addColumn('fname', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('lname', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('mobile', 'string', ['limit' => 10, 'null' => false])
            ->addColumn('username', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 45, 'null' => false])
            ->addColumn('status', 'integer', ['default' => 1, 'null' => false])
            ->addColumn('user_type_id', 'integer', ['signed' => false, 'null' => true])
            ->addColumn('address_number', 'string', ['limit' => 10, 'null' => true])
            ->addColumn('address_street', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('address_city', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('image_path', 'string', ['limit' => 100, 'null' => true])
            ->save();

        // relationships
        $user->addForeignKey('user_type_id', 'user_type', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->save();

        // save the table
        // $user->save();
    }
}
