<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Products</h1>
                    <div class="py-12">
                        
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            
                                <div>
                                    @if(session()->has('success'))
                                    <div>
                                        {{session('success')}}
                                    </div>
                            
                                    @endif
                                </div>

                                {{-- <a href="{{route('cart')}}"><button>Add Product</button></a> --}}
                        
                                <div>
                                    <table border='1' style="border: solid 1px black; width:100%">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                    
                                        </tr>
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="text-center">{{$product->id}}</td>
                                                <td class="text-center">{{$product->name}}</td>
                                                <td class="text-center">{{$product->price}}</td>
                                                <td class="text-center">{{$product->description}}</td>
                                                <td class="text-center">
                                                    <form action="{{route('session',$product->id )}}" method="post">
                                                        @method('PUT')
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <button type="submit">Buy</button>
                                                    </form>
                                                    <form action="{{route('cart.addtocart',$product->id )}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="submit" value="add to cart">
                                                    </form>
                                               
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
