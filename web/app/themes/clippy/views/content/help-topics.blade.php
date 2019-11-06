<?php /** @var \ClippyKB\Content\HelpTopics $content */ ?>
<?php /** @var bool $first */ ?>
<?php /** @var bool $last */ ?>
<div class="content-block help-topics @if($first)first @endif @if($last)last @endif">
    <div class="content">
        @foreach($content->terms as $term)
        <div class="topic">
            <h2>{{$term->term->name}}</h2>
            <ul>
                @foreach($term->children as $childTerm)
                    <li>
                        <a href="{{get_term_link($childTerm->term->term_id)}}">
                            <picture>
                                @if(!empty($childTerm->icon))
                                    @if($childTerm->icon->mime == 'image/svg+xml')
                                    {!! $childTerm->icon->img() !!}
                                    @else
                                    {!! $childTerm->icon->img('help-topic-list') !!}
                                    @endif
                                @else
                                    Missing Image
                                @endif
                            </picture>
                            <div>
                                <h3>{{$childTerm->term->name}}</h3>
                                <p>{{$childTerm->term->description}}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>