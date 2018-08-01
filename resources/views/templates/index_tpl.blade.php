@extends('index')
@section('content')

<?php
$setting = Cache::get('setting');
$slider = DB::table('slider')->select()->where('status',1)->where('com','gioi-thieu')->orderBy('created_at','desc')->get();

?>

@endsection
