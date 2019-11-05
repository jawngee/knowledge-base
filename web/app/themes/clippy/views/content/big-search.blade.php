<?php /** @var \ClippyKB\Content\BigSearch $content */ ?>
<?php /** @var bool $first */ ?>
<?php /** @var bool $last */ ?>
<div class="pre-content-block big-search @if($first)first @endif @if($last)last @endif">
    <div class="content">
        <h1>{{$content->title}}</h1>
        <form id="big-search-form">
            <label class="screen-reader-text" for="s">Search For</label>
            <input type="text" id="s" name="s" data-swplive="true" placeholder="{{$content->placeholder}}" data-swpparentel="#big-search-form .auto-search-results">
            <button type="submit">Search</button>
            <div class="auto-search-results"></div>
        </form>
    </div>
</div>