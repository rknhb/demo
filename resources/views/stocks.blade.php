<!DOCTYPE html>
<html class="lenis lenis-smooth wf-dnp-shuei-gothic-gin-std-n4-active wf-dnp-shuei-gothic-gin-std-n5-avtive wf-dnp-shuei-gothic-gin-std-n6-active wf-active" lang="ja">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/5b69d558cb.js" crossorigin="anonymous"></script>
</head>
<x-app-layout>
    <div class="container-fluid">
        <div class="mx-auto" style="max-width: 1200px;">
            <h1 style="color: #555555; text-align: center; font-size: 1.2em; padding: 24px 0px; font-weight: bold;">商品一覧</h1>
            <div class="">
                <div class="grid grid-cols-4 gap-4 flex-wrap">
                    @foreach($stocks as $stock)
                        <div class="parts-recommend__item splide__slide splide__slide--clone" id="splide01-clone01" style="margin-right: calc(45 * var(--base-fs)); width: calc((100% + calc(45 * var(--base-fs)))/1 - calc(45 * var(--base-fs)));">
                            <div class="parts-recommend__item__header">
                                <p class="parts-recommend__item__title">
                                    <span class="split-text" style="white-space: nowrap; display: inline-block;">
                                        {{$stock->name}}
                                    </span>
                                </p>
                                <div class="mycart_box text-center rounded shadow-lg bg-white p-6">
                                    {{$stock->name}} <br>
                                    {{$stock->fee}}円<br>
                                    <img src="/image/{{$stock->imagePath}}" alt="" class="incart" style="width: 100%; height: 150px; object-fit: cover;">
                                    <br>
                                    {{$stock->explain}} <br>
                                    <form action="addMyCart" method="post">
                                        @csrf
                                        <input type="hidden" name="stockId" value="{{ $stock->id }}">
                                        <button class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded">カートに入れる</button>
                                    </form>
                                    @if (!Auth::user()->is_bookmark($stock->id))
                                    <form action="{{ route('bookmark.store', $stock) }}" method="post">
                                        @csrf
                                        <div class="product-list__fav-items">
                                            <button>
                                                <i class="fa-regular fa-heart like-btn"></i>
                                            </button>
                                        </div>
                                    </form>
                                    @else
                                    <form action="{{ route('bookmark.destroy', $stock) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="product-list__fav-items">
                                            <button>
                                                <i class="fa-solid fa-heart unlike-btn"></i>
                                            </button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center" style="width: 200px; margin: 20px auto;">
                    {{$stocks->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<svg xmlns="http://www.w3.org/2000/svg" style="display:none"><symbol id="heart" viewBox="0 0 1792 1792"><path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26T145 952.5 77 855 23.5 734 0 596q0-220 127-344t351-124q62 0 126.5 21.5t120 58T820 276t76 68q36-36 76-68t95.5-68.5 120-58T1314 128q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z"/></symbol>></svg>
</html>