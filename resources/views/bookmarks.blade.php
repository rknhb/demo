<x-app-layout>
    <div class="container-fluid">
        <div class="mx-auto" style="max-width: 1200px;">
            <h1 style="color: #555555; text-align: center; font-size: 1.2em; padding: 24px 0px; font-weight: bold;">
            {{ Auth::user()->name }}さんのお気に入り</h1>
            @foreach($stocks as $stock)
                <div class="text-center rounded shadow-lg bg-white p-6 m-4">
                    {{$stock->name}} <br>
                    {{ number_format($stock->fee)}}円 <br>
                    <div class="incart flex justify-center p-4 m-4">
                        <img src="/image/{{$stock->imagePath}}" alt="" width="600">
                    </div>
                    <form action="/deleteMyCartStock" method="post">
                        @csrf
                        <input type="hidden" name="stockId" value="{{ $stock->id }}">
                        <input type="submit" value="カートから削除する">
                    </form>
                </div>
            @endforeach
            @if($stocks->isEmpty())
                <p class="text-center">お気に入りははからっぽです。</p>
            @endif
        </div>
    </div>
</x-app-layout>