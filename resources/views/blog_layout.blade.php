
@extends('layout')

@section('title', $story->title)

@section('content')

<style>
.story-page {
    --story-brown: #432719;
    --story-dark: #2d1a12;
    --story-gold: #b78b53;
    --story-cream: #fffaf2;
    --story-beige: #f3eadc;
    --story-muted: #827365;
    --story-border: #e8dccb;

    background: var(--story-cream);
    color: var(--story-brown);
    font-family: Georgia, "Times New Roman", serif;
    overflow: hidden;
}

.story-page * {
    box-sizing: border-box;
}

.story-page a {
    color: inherit;
    text-decoration: none;
}

.story-page button {
    font: inherit;
}

.story-page img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Reading Progress */

.reading-progress {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    width: 100%;
    height: 4px;
    background: var(--story-beige);
}

.reading-progress-bar {
    width: 0;
    height: 100%;
    background: var(--story-gold);
    transition: width 0.1s linear;
}

/* Header */

.story-hero {
    max-width: 1050px;
    margin: 0 auto;
    padding: 65px 24px 45px;
    text-align: center;
}

.story-breadcrumb {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 35px;
    color: var(--story-muted);
    font: 13px Arial, sans-serif;
}

.story-breadcrumb a:hover {
    color: var(--story-gold);
}

.story-category,
.story-eyebrow {
    color: var(--story-gold);
    font: 700 11px Arial, sans-serif;
    letter-spacing: 3px;
}

.story-title {
    max-width: 900px;
    margin: 22px auto;
    color: var(--story-dark);
    font-size: clamp(36px, 5.5vw, 64px);
    font-weight: 400;
    line-height: 1.12;
    letter-spacing: -1.5px;
    overflow-wrap: anywhere;
}

.story-subtitle {
    max-width: 680px;
    margin: 0 auto;
    color: var(--story-muted);
    font: 17px/1.9 Arial, sans-serif;
}

.story-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 22px;
    margin-top: 35px;
    font: 12px Arial, sans-serif;
}

.story-author {
    display: flex;
    align-items: center;
    gap: 12px;
    text-align: left;
}

.author-avatar {
    display: grid;
    place-items: center;
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 50%;
    background: var(--story-brown);
    color: white;
    font: 22px Georgia, serif;
}

.author-name,
.author-role,
.story-date span {
    display: block;
}

.author-name {
    margin-bottom: 5px;
    font-weight: 700;
}

.author-role,
.story-date span {
    color: var(--story-muted);
}

.story-date {
    display: grid;
    gap: 5px;
    text-align: left;
}

.story-date strong {
    font-weight: 400;
}

.meta-divider {
    width: 1px;
    height: 32px;
    background: var(--story-border);
}

.reading-time {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--story-muted);
}

/* Cover */

.story-cover {
    position: relative;
    width: min(1200px, calc(100% - 48px));
    height: clamp(280px, 48vw, 600px);
    margin: 0 auto;
    overflow: hidden;
    border-radius: 4px;
    background: var(--story-beige);
}

.story-cover::after {
    position: absolute;
    inset: 45% 0 0;
    background: linear-gradient(transparent, rgba(35, 20, 12, 0.5));
    content: "";
    pointer-events: none;
}

.cover-caption {
    position: absolute;
    z-index: 1;
    right: 28px;
    bottom: 25px;
    left: 28px;
    color: white;
    font: italic 15px Georgia, serif;
    text-align: right;
}

/* Article Layout */

.story-layout {
    display: grid;
    grid-template-columns: 220px minmax(0, 720px);
    justify-content: center;
    align-items: start;
    gap: 65px;
    max-width: 1200px;
    margin: 90px auto;
    padding: 0 28px;
}

.story-sidebar {
    position: sticky;
    top: 35px;
}

.story-toc {
    display: flex;
    flex-direction: column;
    padding: 22px 0 22px 18px;
    border-left: 1px solid var(--story-border);
}

.toc-label {
    margin-bottom: 20px;
    color: var(--story-muted);
    font: 700 10px Arial, sans-serif;
    letter-spacing: 2px;
}

.toc-link {
    position: relative;
    padding: 11px 0;
    color: var(--story-muted) !important;
    font: 13px/1.5 Arial, sans-serif;
    transition: color 0.2s;
}

.toc-link:hover,
.toc-link.active {
    color: var(--story-brown) !important;
}

.toc-link.active::before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: -19px;
    width: 2px;
    background: var(--story-gold);
    content: "";
}

/* Story Tools */

.story-tools {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--story-border);
}

.article-label {
    color: var(--story-gold);
    font: 700 10px Arial, sans-serif;
    letter-spacing: 2px;
}

.font-controls {
    display: flex;
    gap: 8px;
}

.font-controls button {
    width: 38px;
    height: 36px;
    border: 1px solid var(--story-border);
    border-radius: 3px;
    background: transparent;
    color: var(--story-brown);
    cursor: pointer;
    transition: all 0.2s;
}

.font-controls button:hover {
    background: var(--story-brown);
    color: white;
}

/* Article Typography */

.story-content {
    min-width: 0;
}

.article-section {
    scroll-margin-top: 100px;
}

.article-section p {
    margin: 0 0 25px;
    color: #59483a;
    font-size: var(--article-font-size, 18px);
    line-height: 2;
    overflow-wrap: anywhere;
}

.article-section .story-lead {
    color: var(--story-brown);
    font-size: calc(var(--article-font-size, 18px) + 3px);
    line-height: 1.9;
}

.article-section h2 {
    margin: 55px 0 22px;
    color: var(--story-dark);
    font-size: clamp(28px, 3.5vw, 38px);
    font-weight: 400;
    line-height: 1.25;
    scroll-margin-top: 100px;
}

.story-quote {
    position: relative;
    margin: 45px 0;
    padding: 35px 35px 30px;
    border-left: 3px solid var(--story-gold);
    background: var(--story-beige);
}

.story-quote .quote-mark {
    display: block;
    height: 35px;
    color: var(--story-gold);
    font: 60px Georgia, serif;
}

.story-quote p {
    margin: 15px 0 20px;
    color: var(--story-brown);
    font: italic 25px/1.6 Georgia, serif;
}

.quote-credit {
    color: var(--story-muted);
    font: 700 10px Arial, sans-serif;
    letter-spacing: 2px;
}

/* End of Story */

.story-end {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 18px;
    margin: 65px 0 35px;
    color: var(--story-gold);
    text-align: center;
}

.story-end p {
    margin: 0;
    font: italic 19px Georgia, serif;
}

.end-decoration {
    font-size: 15px;
}

.story-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    padding: 25px 0;
    border-top: 1px solid var(--story-border);
    border-bottom: 1px solid var(--story-border);
    font: 13px Arial, sans-serif;
}

.back-to-blog,
.share-story {
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.back-to-blog:hover,
.share-story:hover {
    color: var(--story-gold);
}

.share-story {
    padding: 10px 14px;
    border: 1px solid var(--story-border);
    border-radius: 3px;
    background: transparent;
    color: var(--story-brown);
    cursor: pointer;
}

/* Related Stories */

.related-stories {
    padding: 85px 30px 100px;
    background: #f5ecdf;
}

.related-heading {
    margin-bottom: 45px;
    text-align: center;
}

.related-heading h2 {
    margin: 15px 0;
    color: var(--story-dark);
    font: 400 clamp(30px, 4vw, 42px) Georgia, serif;
}

.related-heading p {
    color: var(--story-muted);
    font: 14px/1.8 Arial, sans-serif;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 28px;
    max-width: 1150px;
    margin: 0 auto;
}

.related-card {
    min-width: 0;
}

.related-image {
    height: 240px;
    margin-bottom: 20px;
    overflow: hidden;
    background: var(--story-border);
}

.related-image img {
    transition: transform 0.5s ease;
}

.related-card:hover .related-image img {
    transform: scale(1.05);
}

.related-category {
    color: var(--story-gold);
    font: 700 10px Arial, sans-serif;
    letter-spacing: 2px;
}

.related-card h3 {
    margin: 12px 0 16px;
    color: var(--story-brown);
    font: 400 23px/1.4 Georgia, serif;
    overflow-wrap: anywhere;
}

.related-link {
    color: var(--story-muted);
    font: 12px Arial, sans-serif;
}

.related-card:hover .related-link {
    color: var(--story-gold);
}

/* Responsive */

@media (max-width: 900px) {
    .story-layout {
        grid-template-columns: 1fr;
        gap: 30px;
        max-width: 760px;
        margin: 60px auto;
    }

    .story-sidebar {
        position: static;
    }

    .story-toc {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 5px 15px;
        padding: 15px;
        border: 1px solid var(--story-border);
    }

    .toc-label {
        grid-column: 1 / -1;
    }

    .toc-link.active::before {
        left: -8px;
    }

    .related-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 600px) {
    .story-hero {
        padding: 40px 20px 32px;
    }

    .story-breadcrumb {
        margin-bottom: 25px;
    }

    .story-title {
        font-size: 38px;
        letter-spacing: -0.8px;
    }

    .story-subtitle {
        font-size: 15px;
    }

    .story-meta {
        gap: 14px;
    }

    .meta-divider {
        display: none;
    }

    .story-cover {
        width: calc(100% - 30px);
        height: 300px;
    }

    .story-layout {
        margin: 45px auto;
        padding: 0 20px;
    }

    .story-toc {
        grid-template-columns: 1fr;
    }

    .article-section p {
        font-size: var(--article-font-size, 17px);
        line-height: 1.9;
    }

    .article-section .story-lead {
        font-size: calc(var(--article-font-size, 17px) + 2px);
    }

    .story-quote {
        padding: 25px 22px;
    }

    .story-quote p {
        font-size: 22px;
    }

    .story-footer {
        align-items: flex-start;
    }

    .related-stories {
        padding: 60px 20px;
    }

    .related-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .related-image {
        height: 260px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .story-page *,
    .story-page *::before,
    .story-page *::after {
        scroll-behavior: auto !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

<section class="story-page">

    <div class="reading-progress">
        <div class="reading-progress-bar" id="readingProgress"></div>
    </div>

    {{-- Story Header --}}

    <header class="story-hero">

        <div class="story-breadcrumb">
            <a href="{{ route('Home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('blog') }}#blog">Blog</a>
            <span>/</span>
            <span>Story</span>
        </div>

        <div class="story-category">
            {{ strtoupper($story->category) }}
        </div>

        <h1 class="story-title">
            {{ $story->title }}
        </h1>

        <p class="story-subtitle">
            {{ $story->excerpt }}
        </p>

        <div class="story-meta">

            <div class="story-author">
                <div class="author-avatar">B</div>

                <div>
                    <span class="author-name">Bookish Editorial</span>
                    <span class="author-role">Bookish Team</span>
                </div>
            </div>

            <span class="meta-divider"></span>

            <div class="story-date">
                <span>Published</span>

                <strong>
                    {{ $story->published_at?->format('F d, Y') ?? 'Not published' }}
                </strong>
            </div>

            <span class="meta-divider"></span>

            <span class="reading-time">
                <i class="fa-regular fa-clock"></i>
                <span id="readingTime">Calculating...</span>
            </span>

        </div>

    </header>

    {{-- Featured Image --}}

    <div class="story-cover">

        <img
            src="{{ asset($story->cover_image) }}"
            alt="{{ $story->title }}"
        >

        <span class="cover-caption">
            {{ $story->title }}
        </span>

    </div>

    {{-- Article Layout --}}

    <div class="story-layout">

        {{-- Table of Contents --}}

        <aside class="story-sidebar">

            <div class="story-toc">

                <span class="toc-label">IN THIS STORY</span>

                <a href="#story-start" class="toc-link active">
                    Introduction
                </a>

                @php
                    $paragraphs = preg_split(
                        '/\R\s*\R/',
                        trim($story->content)
                    );

                    if (
                        !empty($paragraphs) &&
                        trim($paragraphs[0]) === trim($story->title)
                    ) {
                        array_shift($paragraphs);
                    }

                    $paragraphs = array_values(array_filter(
                        array_map('trim', $paragraphs),
                        fn ($paragraph) => $paragraph !== ''
                    ));

                    $sections = [];
                    $currentSection = null;

                    foreach ($paragraphs as $index => $paragraph) {
                        $isHeading = mb_strlen($paragraph) <= 75
                            && !str_ends_with($paragraph, '.')
                            && !str_ends_with($paragraph, ',')
                            && !str_ends_with($paragraph, '?')
                            && !str_ends_with($paragraph, '!');

                        if ($index === 0) {
                            $isHeading = false;
                        }

                        if ($isHeading) {
                            $currentSection = [
                                'title' => $paragraph,
                                'id' => 'section-' . $index,
                                'paragraphs' => [],
                            ];

                            $sections[] = $currentSection;
                        } else {
                            if (empty($sections)) {
                                $sections[] = [
                                    'title' => 'Introduction',
                                    'id' => 'story-start',
                                    'paragraphs' => [],
                                ];
                            }

                            $lastIndex = count($sections) - 1;
                            $sections[$lastIndex]['paragraphs'][] = $paragraph;
                        }
                    }
                @endphp

                @foreach ($sections as $section)
                    @if ($section['id'] !== 'story-start')
                        <a
                            href="#{{ $section['id'] }}"
                            class="toc-link"
                        >
                            {{ $section['title'] }}
                        </a>
                    @endif
                @endforeach

            </div>

        </aside>

        {{-- Main Article --}}

        <article class="story-content" id="story-content">

            <div class="story-tools">

                <span class="article-label">
                    THE ART OF READING
                </span>

                <div class="font-controls">

                    <button
                        type="button"
                        id="decreaseFont"
                        aria-label="Decrease font size"
                        title="Decrease font size"
                    >A−</button>

                    <button
                        type="button"
                        id="increaseFont"
                        aria-label="Increase font size"
                        title="Increase font size"
                    >A+</button>

                </div>

            </div>

            <div class="article-section" id="story-start">

                @foreach ($sections as $sectionIndex => $section)

                    <section
                        class="story-content-section"
                        @if ($section['id'] !== 'story-start')
                            id="{{ $section['id'] }}"
                        @endif
                    >

                        @if ($section['id'] !== 'story-start')
                            <h2>{{ $section['title'] }}</h2>
                        @endif

                        @foreach ($section['paragraphs'] as $paragraphIndex => $paragraph)

                            @if ($sectionIndex === 0 && $paragraphIndex === 0)
                                <p class="story-lead">
                                    {{ $paragraph }}
                                </p>
                            @else
                                <p>
                                    {{ $paragraph }}
                                </p>
                            @endif

                        @endforeach

                    </section>

                @endforeach

            </div>

            {{-- End of Story --}}

            <div class="story-end">
                <span class="end-decoration">✦</span>
                <p>Every page is a new beginning.</p>
                <span class="end-decoration">✦</span>
            </div>

            <div class="story-footer">

                <a href="{{ route('blog') }}#blog" class="back-to-blog">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to all stories
                </a>

                <button
                    type="button"
                    id="shareStory"
                    class="share-story"
                >
                    <i class="fa-solid fa-share-nodes"></i>
                    Share Story
                </button>

            </div>

        </article>

    </div>

    {{-- Related Stories --}}

    <section class="related-stories">

        <div class="related-heading">

            <span class="story-eyebrow">KEEP EXPLORING</span>

            <h2>More Stories for You</h2>

            <p>
                There is always another world waiting between the pages.
            </p>

        </div>

        @php
            $relatedStories = \App\Models\Story::where('status', 'published')
                ->where('published_at', '<=', now())
                ->where('id', '!=', $story->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        @endphp

        <div class="related-grid">

            @forelse ($relatedStories as $relatedStory)

                <a
                    href="{{ route('story.show', $relatedStory->slug) }}"
                    class="related-card"
                >

                    <div class="related-image">

                        <img
                            src="{{ asset($relatedStory->cover_image) }}"
                            alt="{{ $relatedStory->title }}"
                            loading="lazy"
                        >

                    </div>

                    <span class="related-category">
                        {{ strtoupper($relatedStory->category) }}
                    </span>

                    <h3>{{ $relatedStory->title }}</h3>

                    <span class="related-link">
                        Read Story →
                    </span>

                </a>

            @empty

                <p>No related stories available yet.</p>

            @endforelse

        </div>

    </section>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const storyPage = document.querySelector('.story-page');

    if (!storyPage) return;

    const progressBar = document.getElementById('readingProgress');
    const article = document.getElementById('story-content');

    // Reading progress

    function updateReadingProgress() {

        const scrollableHeight =
            document.documentElement.scrollHeight - window.innerHeight;

        if (scrollableHeight <= 0) {
            progressBar.style.width = '0%';
            return;
        }

        const progress = (window.scrollY / scrollableHeight) * 100;

        progressBar.style.width =
            Math.min(100, Math.max(0, progress)) + '%';
    }

    window.addEventListener('scroll', updateReadingProgress, {
        passive: true
    });

    window.addEventListener('resize', updateReadingProgress);

    updateReadingProgress();

    // Smooth navigation

    storyPage.querySelectorAll('.toc-link').forEach(function (link) {

        link.addEventListener('click', function (event) {

            const targetId = link.getAttribute('href');

            if (!targetId || !targetId.startsWith('#')) return;

            const target = document.getElementById(targetId.slice(1));

            if (!target) return;

            event.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

            history.replaceState(null, '', targetId);
        });

    });

    // Highlight active section

    const sections = storyPage.querySelectorAll(
        '.article-section[id], .story-content-section[id]'
    );

    const tocLinks = storyPage.querySelectorAll('.toc-link');

    if ('IntersectionObserver' in window) {

        const sectionObserver = new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) return;

                    tocLinks.forEach(function (link) {

                        link.classList.toggle(
                            'active',
                            link.getAttribute('href') ===
                                '#' + entry.target.id
                        );

                    });

                });

            },
            {
                rootMargin: '-20% 0px -65% 0px'
            }
        );

        sections.forEach(function (section) {
            sectionObserver.observe(section);
        });
    }

    // Change article font size

    let fontSize = 18;

    const decreaseFont = document.getElementById('decreaseFont');
    const increaseFont = document.getElementById('increaseFont');

    function updateFontSize() {

        article.style.setProperty(
            '--article-font-size',
            fontSize + 'px'
        );
    }

    decreaseFont.addEventListener('click', function () {
        fontSize = Math.max(14, fontSize - 1);
        updateFontSize();
    });

    increaseFont.addEventListener('click', function () {
        fontSize = Math.min(24, fontSize + 1);
        updateFontSize();
    });

    // Calculate reading time

    const articleText = article.innerText.trim();

    const wordCount = articleText
        ? articleText.split(/\s+/).length
        : 0;

    const minutes = Math.max(1, Math.ceil(wordCount / 200));

    document.getElementById('readingTime').textContent =
        minutes + ' min read';

    // Share story

    const shareButton = document.getElementById('shareStory');

    shareButton.addEventListener('click', async function () {

        const shareData = {
            title: document.querySelector('.story-title').innerText,
            text: document.querySelector('.story-subtitle').innerText,
            url: window.location.href
        };

        try {

            if (navigator.share) {

                await navigator.share(shareData);

            } else if (
                navigator.clipboard &&
                window.isSecureContext
            ) {

                await navigator.clipboard.writeText(shareData.url);

                shareButton.innerHTML =
                    '<i class="fa-solid fa-check"></i> Link Copied';

                setTimeout(function () {

                    shareButton.innerHTML =
                        '<i class="fa-solid fa-share-nodes"></i> Share Story';

                }, 2000);

            } else {

                window.prompt(
                    'Copy this story link:',
                    shareData.url
                );

            }

        } catch (error) {

            if (error.name !== 'AbortError') {
                console.error('Unable to share story:', error);
            }

        }

    });

});
</script>

@endsection
