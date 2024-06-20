@extends('app')

@section('content')

<div class="container w-25 border p-4">
        <form action="{{route('categories.update', ['category' => $category->id])}}" method="POST" >
        @method('PATCH')
        @csrf
        
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror


        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoría</label>
            <input type="text" class="form-control" id="name_categoria" name="name" value="{{old('name', $category->name)}}">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Nombre de la categoría</label>
            <input type="color" class="form-control" id="color_categoria" name="color" value="{{old('color', $category->color)}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Categoría</button> 
        </form>
        <div>
            @if($category->todos()->count() > 0)
                @foreach($category->todos as $todo)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <li class="list-group-item"><a href="{{route('todos-edit', ['id' => $todo->id])}}">{{$todo->title}}</a>
                        </li>
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <form action="{{route('todos-destroy',$todo->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
                
            @endforeach
            
            @else
            <p>No hay tareas asociadas a esta categoría</p>
            @endif
        </div>
    </div>

@endsection