<div>
    @if(!empty($products))
        <section>
            <h1 class="text-3xl">Produse in cos</h1>
            @foreach($products as $product)
                <div class="flex border font-serif">
                    <div class="flex-none w-52 relative">
                        <img src="{{url('storage/'.$product['product_photo_path'])}}" alt="{{$product['title']}}"
                             class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy"/>
                    </div>
                    <div class="flex-auto p-6">
                        <div class="flex flex-col flex-wrap items-baseline">
                            <h1 class="w-full flex-none mb-3 text-2xl leading-none text-slate-900">
                                {{$product['title']}}
                            </h1>
                            <p class="text-xl">{{$product['brand']}}</p>
                            <p>Description: {{$product['description']}}</p>
                            <div class="flex-auto text-lg font-medium text-slate-500">
                                Price: {{$product['price']}} MDL
                            </div>
                        </div>

                        @livewire('delete-button', ['productId' => $product['id']], key($product['id']))

                    </div>
                </div>
            @endforeach
            @livewire('buy-button')
        </section>
    @else
        <h1 class="text-3xl">Nu sunt produse in cos!</h1>
    @endif
</div>