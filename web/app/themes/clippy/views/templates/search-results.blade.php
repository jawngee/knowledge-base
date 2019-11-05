<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
/** @var \Stem\Models\Query\PostCollection $posts */
?>

@extends('templates.content-page', ['preContent' => $preContent, 'mainContent' => $mainContent, 'postContent' => $postContent ])

@section('page-content')
    @include('partials.breadcrumbs', ['linkLast' => 'Search Results for <strong>'.sanitize_text_field($_REQUEST['s']).'</strong>'])
    <div class="page search-results">
        <header>
            {{ $posts->total() }} results for <strong>{{sanitize_text_field($_REQUEST['s'])}}</strong>
        </header>
        <div class="articles-list">
            <div class="section-header">
            </div>
            <ul class="articles">
                @foreach($posts as $post)
                    <li>
                        <a class="article" href="{{$post->permalink}}">
                            <h3>{{$post->title}}</h3>
                            <p>{!! $post->excerpt(50, false, null) !!}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="pagination">
                {!! paginate_links()!!}
            </div>
        </div>
    </div>
@endsection
