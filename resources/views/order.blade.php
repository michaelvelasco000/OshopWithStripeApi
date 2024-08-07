
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
                    <h1>Ordered Products</h1>
                    <div class="py-12">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                               
                                <div>
                                    @if(session()->has('success'))
                                    <div>
                                        {{session('success')}}
                                    </div>
                            
                                    @endif
                                </div>
                                {{-- <a href="{{route('product.create')}}"><button>Add Product</button></a> --}}
                            
                                <div>
                                    <table border='1' style="border: solid 1px black; width:100%">
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                    
                                        </tr>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center">{{$order->productID}}</td>
                                            <td class="text-center">{{$order->name}}</td>
                                            <td class="text-center">{{$order->price}}</td>
                                            <td class="text-center">{{$order->description}}</td>
                                            @if(Auth()->user()->usertype == 'user')
                                            <td class="text-center">
                                                {{-- <form action="{{route('session',$cart->productID )}}" method="post">
                                                    @method('PUT')
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit">Checkout</button>
                                                </form> --}}
                                                <form action="{{route('destroyorder',['order'=> $order])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Delete">
                                                </form>
                                        
                                            </td>
                                            @endif
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
