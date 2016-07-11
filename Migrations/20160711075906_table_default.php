<?php

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class TableDefault extends AbstractMigration
{
    public function change()
    {
        $this->table('url_list')
            ->addColumn('url', 'string', ['limit' => 500, 'null' => false])
            ->addColumn('alias', 'string', ['limit'=> 30, 'null' => false])
            ->addColumn('status', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 1])
            ->addColumn('add_time', 'integer')
            ->addColumn('click_num', 'integer', ['default' => 0])
            ->addIndex(['id', 'alias'],[])
            ->create();
    }
}
