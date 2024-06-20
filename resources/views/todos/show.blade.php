@extends('app');

@section('content')
    <div class="container w-25 border p-4">
        <form action="{{route('todos-update', ['id' => $todo->id])}}" method="POST" >
        @method('PATCH')
        @csrf
        
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Título de la tarea</label>
            <input type="text" class="form-control" id="titulo_tarea" name="title" value="{{old('title', $todo->title)}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button> 
        </form>
    </div>
@endsection