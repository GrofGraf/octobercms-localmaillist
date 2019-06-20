<?php namespace GrofGraf\LocalMaillist\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use GrofGraf\LocalMaillist\Models\Maillist as MaillistModel;

/**
 * Maillist Back-end Controller
 */
class Maillist extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ImportExportController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('GrofGraf.LocalMaillist', 'localmaillist', 'maillist');
    }
}
