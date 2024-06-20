@extends('app');

@section('content')
    <div class="container w-25 border p-4">
        <form action="{{route('todos')}}" method="POST" >
        @csrf
        
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Título de la tarea</label>
            <input type="text" class="form-control" id="titulo_tarea" name="title">
        </div>
        <button type="submit" class="btn btn-primary">Crear Nueva Tarea</button> 
        </form>
        <div >
            @foreach ($todos as $todo)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <li class="list-group-item">{{$todo->title}}
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
        </div>
    </div>
@endsection