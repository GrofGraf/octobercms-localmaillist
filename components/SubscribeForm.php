<?php namespace GrofGraf\LocalMaillist\Components;

use Cms\Classes\ComponentBase;
use GrofGraf\LocalMaillist\Models\Maillist;
use GrofGraf\LocalMaillist\Models\Settings;
use Validator;
use ValidationException;

class SubscribeForm extends ComponentBase
{

    public $rules = [
        'email' => ['required', 'email']
    ];
    public function componentDetails()
    {
        return [
            'name'        => 'subscribeForm Component',
            'description' => 'Maillist subscription form'
        ];
    }

    public function defineProperties()
    {
        return [
          'loadJS' => [
              'title'       => 'Load JS',
              'description' => 'Load javascript required for animation',
              'type'        => 'checkbox',
              'default'     => true,
          ],
        ];
    }

    public function init(){
      //This will execute when the component is first initialized, including AJAX events
    }

    public function onRun(){
      //This code will not execute for AJAX events
      if($this->property('loadJS') == true) {
        $this->addJs('assets/js/main.js');
      }
      $this->page['localmaillist'] = [
        'button_text' => Settings::instance()->button_text ?: "Subscribe",
        'placeholder_text' => Settings::instance()->placeholder_text ?: "Enter your email"
      ];
    }

    public function onSubscribe(){

      $validator = Validator::make(post(), $this->rules);
      if($validator->fails()){
        throw new ValidationException($validator);
      }
      $email = post('email');
      $maillist = $this->property('maillist');
      $name = post('name');

      $this->subscribe($email, $maillist, $name);
      $this->page["subscription_confirmation_message"] = Settings::instance()->subscription_message;
      if(Settings::get('enable_auto_reply')){
        $this->autoReply();
      }
      $this->page["confirmation_text"] = Settings::instance()->confirmation_text ?: "You successfully subscribed to our maillist.";
      return;
    }

    public static function subscribe($email, $maillist, $name){
      $maillist_title = $maillist ?: Settings::get('maillist_title');
      $m = Maillist::where("email", $email)->where('maillist', $maillist_title)->first() ?: new Maillist;
      if($name) $m->name = $name;
      $m->email = $email;
      $m->maillist = $maillist_title;
      $m->subscribed = true;
      $m->save();
    }

    public function autoReply(){
      Mail::send('grofgraf.localmaillist::emails.subscription-information', array('auto_reply' => Settings::instance()->auto_reply_content), function($m){
        $m->to(post('email'), post('name'))
          ->subject(Settings::instance()->auto_reply_subject);
      });
    }
}
