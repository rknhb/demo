<!DOCTYPE html>
<html class="lenis lenis-smooth wf-dnp-shuei-gothic-gin-std-n4-active wf-dnp-shuei-gothic-gin-std-n5-avtive wf-dnp-shuei-gothic-gin-std-n6-active wf-active" lang="ja">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/5b69d558cb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <section class="recommend">
            <div class="parts-recommend splide is-overflow is-initialized splide--loop splide--ltr splide--draggable is-active" id="splide01" role="region" aria-roledescription="carousel">
                <div class="parts-recommend__slider-wrap splide__track splide__track--loop splide__track--ltr splide__track--draggable" slide-area="section" id="splide01-track" style="padding-left: 0px; padding-right: 0px;" aria-live="off" aria-atomic="true" aria-busy="false">
                    <div class="parts-recommend__slider splide__list" slide-area="target" id="splide01-list" role="presentation" style="transform: translateX(-1833.56px); transition: transform 1000ms cubic-bezier(0.25, 1, 0.5, 1) 0s;">
                        @foreach($stocks as $stock)
                        <div class="parts-recommend__item splide__slide splide__slide--clone" id="splide01-clone01" style="margin-right: calc(45 * var(--base-fs)); width: calc((100% + calc(45 * var(--base-fs)))/1 - calc(45 * var(--base-fs)));">
                            <div class="parts-recommend__item__header">
                                <p class="parts-recommend__item__title">
                                    <span class="split-text" style="white-space: nowrap; display: inline-block; --back-size: 1;">
                                        {{$stock->name}}
                                    </span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>