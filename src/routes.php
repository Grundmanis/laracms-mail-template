<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\MailTemplate\Controllers',
    'prefix'     => 'laracms/mail-template/'
], function () {
    Route::get('/', 'MailTemplateController@index')->name('laracms.mail-template');
    Route::get('create', 'MailTemplateController@create')->name('laracms.mail-template.create');
    Route::post('create', 'MailTemplateController@store');
    Route::get('edit/{template}', 'MailTemplateController@edit')->name('laracms.mail-template.edit');
    Route::post('edit/{template}', 'MailTemplateController@update');
    Route::get('destroy/{template}', 'MailTemplateController@destroy')->name('laracms.mail-template.destroy');
});