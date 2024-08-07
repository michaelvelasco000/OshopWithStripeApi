<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                    {{-- <a href="{{route('auth.register')}}"><button>Add User</button></a> --}}
                
                    <div>
                        <table border='1' style="border: solid 1px black; width:100%">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                            @foreach($user as $user)
                                <tr>
                                    <td class="text-center">{{$user->id}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{$user->usertype}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.edituser', ['user'=> $user])}}">→Edit</a>
                                        <form action="{{route('user.destroyuser',['user'=> $user])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="→Delete">
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
   
</body>
</html>
</body>
</html>