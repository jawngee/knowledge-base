<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
/** @var \ClippyKB\Content\HelpTopicTerm[] $termList */
/** @var \ClippyKB\Content\HelpTopicTerm[] $childTerms */
/** @var \ClippyKB\Content\HelpTopicTerm $currentTerm */
/** @var \Stem\Models\Query\PostCollection $posts */
?>

@extends('templates.content-page', ['preContent' => $preContent, 'mainContent' => $mainContent, 'postContent' => $postContent ])

@section('page-content')
    @include('partials.breadcrumbs', ['termList' => $termList, 'linkLast' => false])
    <div class="page article-category-landing">
        <div class="toc">
            <h4>Categories</h4>
            <ul class="categories">
                @foreach($childTerms as $childTerm)
               <li class="@if($currentTerm->term->term_id === $childTerm->term->term_id)current @endif">
                    <a href="{{get_term_link($childTerm->term->term_id)}}">{{$childTerm->term->name}}</a>
               </li>
                @endforeach
            </ul>
        </div>
        <div class="articles-list">
            <div class="section-header">
                <picture>
                    @if(!empty($currentTerm->icon))
                        @if($currentTerm->icon->mime == 'image/svg+xml')
                            {!! $currentTerm->icon->img() !!}
                        @else
                            {!! $currentTerm->icon->img('help-topic-list') !!}
                        @endif
                    @else
                        Missing Image
                    @endif
                </picture>
                <div>
                    <h2>{{$currentTerm->term->name}}</h2>
                    <p>{{$currentTerm->term->description}}</p>
                </div>
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
