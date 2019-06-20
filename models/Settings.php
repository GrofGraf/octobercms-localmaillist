<?php namespace GrofGraf\LocalMaillist\Models;

use Model;

class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = [
      'System.Behaviors.SettingsModel',
      '@RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
      'subscribe_button_text',
      'subscribe_confirmation_text',
      'subscribe_placeholder_text',
      'auto_reply_subject',
      'auto_reply_content'
    ];

    public $rules = [
      'subscribe_button_text' => ['required'],
      'confirmation_text' => ['required'],
      'auto_reply_subject' => ['required_if:enable_auto_reply,1'],
      'auto_reply_content' => ['required_if:enable_auto_reply,1'],
    ];

    // A unique code
    public $settingsCode = 'local_maillist_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

}
