<?php

Route::group(["prefix"=>"faqs",], function(){
    Route::get('/','FaqController@index')->name('fags.index');
});