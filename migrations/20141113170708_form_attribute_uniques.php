<?php

use Phinx\Migration\AbstractMigration;

class FormAttributeUniques extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('form_attributes')
            ->removeIndex(['key'])
            ->addIndex(['key', 'form_group_id'], ['unique' => true])
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('form_attributes')
            ->removeIndex(['key', 'form_group_id'])
            ->addIndex(['key'], ['unique' => true])
            ->save();
    }
}
