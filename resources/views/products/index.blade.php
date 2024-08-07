
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
        <h1>Shop</h1>
        <div class="py-12">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   
                    <div>
                        @if(session()->has('success'))
                        <div>
                            {{session('success')}}
                        </div>
                
                        @endif
                    </div>
                    <a href="{{route('product.create')}}"><button>Add Product</button></a>
                
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
                                        <a href="{{route('product.edit', ['product'=> $product])}}">Edit</a>
                                        <form action="{{route('product.destroy',['product'=> $product])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>