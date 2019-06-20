<?php namespace GrofGraf\LocalMaillist\Models;

use Backend\Models\ExportModel;
use ApplicationException;

/**
 * Post Export Model
 */
class MaillistExport extends ExportModel
{
    public $table = 'grofgraf_localmaillist_maillists';

    public function exportData($columns, $sessionKey = null)
    {
        $result = self::make()
            ->get()
            ->toArray()
        ;

        return $result;
    }
}
