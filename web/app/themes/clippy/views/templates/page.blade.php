<?php
/** @var \Stem\Models\Page $page */
?>

@extends('layouts.page')

@section('main')
    <div class="page generic-page">
        <h1>{{ $page->title }}</h1>
        {!! $page->content !!}
    </div>
@endsection

@section('after-main')
@endsection