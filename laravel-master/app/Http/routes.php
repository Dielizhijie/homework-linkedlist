<?php

Route::get('LinkedList/construct', 'LinkedListController@construct');

Route::get('LinkedList/insert', 'LinkedListController@insert');
Route::get('LinkedList/in_insert', 'LinkedListController@in_insert');

Route::get('LinkedList/delete', 'LinkedListController@delete');
Route::get('LinkedList/in_delete', 'LinkedListController@in_delete');

Route::get('LinkedList/push', 'LinkedListController@push');
Route::get('LinkedList/in_push', 'LinkedListController@in_push');

Route::get('LinkedList/pop', 'LinkedListController@pop');

Route::get('LinkedList/size', 'LinkedListController@size');

Route::get('LinkedList/print', 'LinkedListController@print_list');

