<?php
/** @var \ClippyKB\Content\HelpTopicTerm[]|null $termList */
/** @var bool|string $linkLast */
?>

<div class="breadcrumbs">
    <div class="contents">
        <ul>
            <li><a href="{{home_url()}}">Home</a></li>
            @isset($termList)
            @foreach($termList as $term)
                <li>
                    @if(!$loop->last || $linkLast)
                        <a href="{{get_term_link($term->term->term_id)}}">{{$term->term->name}}</a>
                    @else
                        <span class="current">{{$term->term->name}}</span>
                    @endif
                </li>
            @endforeach
            @endisset
            @if(!empty($linkLast))
                <li>
                    <span class="current">{!! $linkLast !!}</span>
                </li>
            @endif
        </ul>
        <div class="little-search">
            <form id="little-search-form">
                <label class="screen-reader-text" for="s">Search For</label>
                <input data-swplive="true" type="text" id="s" name="s" placeholder="Search ..." data-swpparentel="#little-search-form .auto-search-results">
                <button type="submit">Search</button>
                <div class="auto-search-results"></div>
            </form>
        </div>
    </div>
</div>
