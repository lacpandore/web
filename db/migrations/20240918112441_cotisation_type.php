<?php

use Phinx\Migration\AbstractMigration;

class CotisationType extends AbstractMigration
{
    public function change()
    {
        // avant on était en float(5,2) unsigned
        $this->execute("ALTER TABLE afup_cotisations MODIFY montant float(6,2) unsigned NOT NULL DEFAULT '0.00'");
    }
}