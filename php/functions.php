<?php

namespace Theme\Core;

// Bludit Namespace
use \Text;
use \Date;
use \Theme;

function renderPage($page, $partial = false)
{
    global $site, $url, $L;

    $pageTags = $page->tags(true);

    // Get the user who created the page.
    $user = $page->user();

    // Default author is the username.
    $author = $user->username();

    // If the user has entered the first/last name, it would be set as author.
    if (Text::isNotEmpty($user->firstName()) || Text::isNotEmpty($user->lastName())) {
        $author = $user->firstName().' '.$user->lastName();
    }

    $timestamp = empty($page->dateModified()) ? $page->date() : Date::format($page->dateModified(), DB_DATE_FORMAT, $site->dateFormat());
    $zuluTime = gmdate("Y-m-d\TH:i:s\Z", strtotime($page->dateRaw()));

    echo '<article class="post">';

    // Plugins Page Begin Hook
    echo Theme::plugins('pageBegin');

    // Page header
    echo '<header>
        <div class="title">
            <h2><a href="'.$page->permalink().'">'.$page->title().'</a></h2>
        </div>
        <div class="meta">
            <span class="timestamp">Posted <time class="published" datetime="'.$zuluTime.'">
                '.$timestamp.'</time> by '.$author.'
            </span>
        </div>
    </header>';

    // Cover Image if exists
    if ($page->coverImage()) {
        echo '<a href="'.$page->permalink().'" class="image featured"><img src="'.$page->coverImage().'" alt="cover-image"></a>';
    }

    // Partial content (pagebreak) in home page with READ MORE link, otherwise full page
    if ($partial === true) {
        echo $page->contentBreak();
    } else {
        echo $page->content();
    }

    // Page footer
    echo '<footer>';
    // Readmore button
    if ($partial) {
        if ($page->readMore()) {
            echo "<a href=" . $page->permalink() . " class='button read-more' title='read-more'>" .$L->get('Read more'). "...</a>";
        }
    }
    // Page Tags
    echo '<div class="tags">TAGS: <span class="tag-list">';
    if (empty($pageTags)) {
        echo 'No tags found.';
    } else {
        $listOfTags = '';
        foreach ($pageTags as $tagKey => $tagName) {
            $listOfTags .= '<a href="'.HTML_PATH_ROOT.$url->filters('tag').'/'.$tagKey.'">'.$tagName.'</a>, ';
        }
        // Remove final ", '" and add "." after the last tag.
        echo substr($listOfTags, 0, -2) . '.';
    }
    echo '</span></div>';
    echo '</footer>';

    // Plugins Page End Hook
    echo Theme::plugins('pageEnd');

    echo '</article>';
}
