@extends('layouts.admin')

@section('title', 'Inventaris')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <section class="bg-transparent">
                <div class="mx-auto max-w-screen-xl">
                    <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900">Inventaris Terbaru</h2>
                        <p class="font-light text-gray-500 sm:text-xl">Pantau stok barang masuk dan keluar secara real-time.</p>
                    </div> 

                    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                        
                        @foreach($inventories as $item)
                        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md flex flex-col justify-between">
                            <div>
                                <div class="mb-5 overflow-hidden rounded-lg h-48">
                                    {{-- @if($item->image) --}}
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="object-cover w-full h-full">
                                    {{-- @else
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="default" class="object-cover w-full h-full">
                                    @endif --}}
                                </div>
                                <div class="flex justify-between items-center mb-5 text-gray-500">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                                        {{ $item->category->name }}
                                    </span>
                                    <span class="text-sm">{{ $item->created_at?->diffForHumans() ?? 'Waktu tidak tersedia' }}</span>
                                </div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                    <a href="#">{{ $item->name }}</a>
                                </h2>
                                <p class="mb-5 font-light text-gray-500">{{ Str::limit($item->description, 100) }}</p>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-bold text-gray-700">Stok: {{ $item->stock }}</span>
                                </div>
                                <a href="{{ route('inventories.show', $item->id) }}" class="inline-flex items-center font-medium text-blue-600 hover:underline">
                                    Detail
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                            </div>
                        </article> 
                        @endforeach

                    </div>  
                </div>
            </section>
            </div>
    </div>
@endsection('content')