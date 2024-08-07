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
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                               
    <h1>Create</h1>
    <div>
        @if ($errors->any())
            <ul>

                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{-- <a href="{{route('/home')}}"><button>back</button></a> --}}
    <form action="{{route('user.updateuser', ['user' => $user])}}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="" placeholder="Name" value="{{$user->name}}" readonly>
        </div>
      
        <div>
            <label for="price">Email</label>
            <input type="email" name="email" id="" placeholder="Email" value="{{$user->email}}" readonly>
        </div>
        <div>
            <label for="usertype">User Type</label>
            <select name="usertype" id="usertype">
                <option value="admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->usertype === 'user' ? 'selected' : '' }}>User</option>
              </select>
        </div>
        <div>
            <input type="submit" value="→Update" >
        </div>
    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

