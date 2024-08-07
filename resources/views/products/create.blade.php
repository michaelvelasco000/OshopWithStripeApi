<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
    <a href="{{route('products.index')}}"><button>back</button></a>
    <form action="{{route('product.store')}}" method="POST">
        @csrf
        @method('post')
        {{-- <input type="text" value="{{$user->user_id}}"> --}}
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="" placeholder="Name" required>
        </div>
       
            <input value="{{ Auth()->user()->id}}" type="text" name="userID" id="" placeholder="Quantity" hidden>
    
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="" placeholder="Price" required>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="" placeholder="Description" required>
        </div>
        <div>
            <input type="submit" value="Save" >
        </div>
    </form>
</body>
</html>