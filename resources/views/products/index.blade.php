@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>TABELA - ADMIN PANEL</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Dodaj nowy produkt</a>
                @auth
                <form class="d-inline-block float-right" action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger">Wyloguj</button>
                </form>
                @else
                <a href="{{route('login') }}" class="btn btn-secondary">Login</a>
                @endauth
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Pancerz</th>
            <th>Działo</th>
            <th>Silnik</th>
            <th width="280px">MENU</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->armor }}</td>
            <td>{{ $product->gun }}</td>
            <td>{{ $product->engine }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Pokaż</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edytuj</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Skasuj</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection