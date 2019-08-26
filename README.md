# Local Maillist

Maillist subscription plugin for OctoberCMS, that saves new contacts to database.

## Advantages
* Translatable content
* Export / Import CSV
* Automatic reply option

## Requirements
* [Ajax Framework](https://octobercms.com/docs/cms/ajax) must be included in your layout/page in order to handle form requests.

## Optional
* [Translate](https://octobercms.com/plugin/rainlab-translate) plugin, if you want to include multilingual contents.
* If you want to enable auto-reply option, configure your [mail](https://octobercms.com/docs/services/mail) settings to make sure your server can send emails.
* If you are using [ContactMe](https://octobercms.com/plugin/grofgraf-contactme) plugin, you can enable automatic or optional subscription on sent inquiry.

## Settings
This plugin creates a Settings menu item, found by navigating to **Settings > Marketing > Local Maillist**. This page allows the setting of maillist title, confirmation message, input labels, button text or enabling auto-reply.

If [Translate](https://octobercms.com/plugin/rainlab-translate) is enabled, auto-reply email, button text and labels are translatable.

## Usage
You can put the subscription form on any front-end page. Add the `subscribeForm` component to a page or layout.

The simplest way to add the contact form is to use the component's default partial and the `{% component %}` tag. Add it to a page or layout where you want to display the form:

    {% component 'subscribeForm' %}

If the default partial is not suitable for your website, replace the component tag with custom code, for example:

    <div class="confirm-subscribe-container">
    </div>
    <form data-request="{{ __SELF__ }}::onSubscribe"
          data-request-update="'{{ __SELF__   }}::confirm': '.confirm-subscribe-container'"
          class="subscription-form"
          >
      <div class="input-group">
        <input type="email" class="form-control" placeholder="{{localmaillist.placeholder_text}}" id="subscribe_email" name="email">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary">{{localmaillist.button_text}}</button>
        </span>
      </div>
    </form>


The example uses standard partial `{{ __SELF__ }}::confirm` for displaying the subscription confirmation message. Confirmation message will be displayed in
`.confirm-subscribe-container`. The default partial located in `plugins/grofgraf/localmaillist/components/subscribeform/confirm.htm`.

Email templates auto-reply can be customized under **Settings > Mail > Mail Templates**

## Authors

* [GrofGraf](https://github.com/GrofGraf)

## License

The MIT License (MIT)

Copyright (c) 2017 GrofGraf

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
