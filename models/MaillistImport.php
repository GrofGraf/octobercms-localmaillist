<?php namespace GrofGraf\LocalMaillist\Models;

use Backend\Models\ImportModel;
use ApplicationException;
use Exception;

/**
 * maillist Import Model
 */
class MaillistImport extends ImportModel
{
    public $table = 'grofgraf_lcoalmaillist_maillist';

    /**
     * Validation rules
     */
    public $rules = [
        'email'   => 'required|email',
    ];

    public function importData($results, $sessionKey = null)
    {
        $firstRow = reset($results);

        /*
         * Import
         */
        foreach ($results as $row => $data) {
            try {
                /*
                 * Find or create
                 */
                $maillist = Maillist::make();

                if ($this->update_existing) {
                    $maillist = $this->findDuplicateContacts($data) ?: $maillist;
                }

                $contactExists = $maillist->exists;

                foreach ($data as $attribute => $value) {
                    $maillist->{$attribute} = $value ?: null;
                }

                $maillist->save();
                /*
                 * Log results
                 */
                if ($contactExists) {
                    $this->logUpdated();
                }
                else {
                    $this->logCreated();
                }
            }
            catch (Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }
    }

    protected function findDuplicateContacts($data)
    {
        return Maillist::where('email', $data['email'])->where('maillist', $data['maillist'] ?: null)->first();
    }
}
