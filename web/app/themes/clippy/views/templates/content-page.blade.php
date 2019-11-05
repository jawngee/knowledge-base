<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
?>

@extends('layouts.page')

@section('before-main')
    @foreach($preContent as $contentBlock)
        {!! $contentBlock->render(false, ['first' => $loop->first, 'last' => $loop->last]) !!}
    @endforeach
@endsection

@section('main')
    @foreach($mainContent as $contentBlock)
        {!! $contentBlock->render(false, ['first' => $loop->first, 'last' => $loop->last]) !!}
    @endforeach

    @yield('page-content')

@endsection

@section('after-main')
    @foreach($postContent as $contentBlock)
        {!! $contentBlock->render(false, ['first' => $loop->first, 'last' => $loop->last]) !!}
    @endforeach
@endsection