<?php

/**
 * Welcome to Luthier-CI!
 *
 * This is your main route file. Put all your HTTP-Based routes here using the static
 * Route class methods
 *
 * Examples:
 *
 *    Route::get('foo', 'bar@baz');
 *      -> $route['foo']['GET'] = 'bar/baz';
 *
 *    Route::post('bar', 'baz@fobie', [ 'namespace' => 'cats' ]);
 *      -> $route['bar']['POST'] = 'cats/baz/foobie';
 *
 *    Route::get('blog/{slug}', 'blog@post');
 *      -> $route['blog/(:any)'] = 'blog/post/$1'
 */

Route::get('/', function () {
    luthier_info();
})->name('homepage');

Route::set('404_override', function () {
    show_404();
});

Route::set('translate_uri_dashes', FALSE);

Route::group('reunioes', function () {
    Route::get('', 'ReuniaoController@index');
    Route::post('{id}/esta_aberta', 'ReuniaoController@abrirReuniao')->name('abrir_reuniao');
    Route::get('{id}/esta_aberta', 'ReuniaoController@mostraReuniao')->name('mostra_reuniao');

    Route::get('registrar', 'ReuniaoController@registraReuniao')->name('registrar');
    Route::get('registrar/{1}', 'ReuniaoController@reuniao');
});

Route::get('{id}/membros/{token}', 'ReuniaoController@regitraReuniao');