<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
/** @var \ClippyKB\Content\HelpTopicTerm[] $termList */
/** @var \Stem\Models\Post $post */

$content = $post->content;
$headerRegex = '/<h([0-9]{1})>([^<]+)/m';

$toc = [];
$toc[] = [
	'title' => $post->title,
    'level' => 1,
    'id' => sanitize_title($post->title),
    'loc' => null
];


if (preg_match_all($headerRegex, $content, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE, 0)) {
	foreach($matches as $match) {

		$title = $match[2][0];
		if (strpos($title, 'Step ') === 0) {
			$title = substr($title, 5);
        }

		$toc[] = [
			'title' => $title,
			'level' => (int)$match[1][0],
			'id' => sanitize_title($match[2][0]),
            'loc' => (int)$match[0][1]
		];
    }
}

for($i = count($toc)  - 1; $i > 0; $i--) {
	$level = $toc[$i]['level'];
	$id = $toc[$i]['id'];
	$loc = $toc[$i]['loc'];

	$content = substr_replace($content, "<h{$level} class='track-pos' id='{$id}'>", $loc, 4);
}

?>

@extends('templates.content-page', ['preContent' => $preContent, 'mainContent' => $mainContent, 'postContent' => $postContent ])

@section('page-content')
    @include('partials.breadcrumbs', ['termList' => $termList, 'linkLast' => $post->title])
    <div class="page article">
        @if(count($toc) > 1)
        <div class="toc">
            <h4>Table of Contents</h4>
            <ul class="toc-entries" data-tracked>
                @foreach($toc as $entry)
                    <li data-tracks="{{$entry['id']}}" class="@if($loop->first)current @endif level-{{$entry['level']}}"><a href="#{{$entry['id']}}">{!! $entry['title'] !!}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
        <article>
            <h1 id="{{sanitize_title($post->title)}}">{{$post->title}}</h1>
            {!! $content !!}
        </article>
    </div>
@endsection
