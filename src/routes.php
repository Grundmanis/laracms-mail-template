<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\MailTemplate\Controllers',
    'prefix'     => 'laracms/mail-template/'
], function () {
    Route::get('/', 'MailTemplateController@index')->name('laracms.mail-template');
});