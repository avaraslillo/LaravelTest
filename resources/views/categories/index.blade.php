@extends('app')

@section('content')

<div class="container w-25 border p-4">
        <form action="{{route('categories.store')}}" method="POST" >
        @csrf
        
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror


        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoría</label>
            <input type="text" class="form-control" id="name_categoria" name="name">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Nombre de la categoría</label>
            <input type="color" class="form-control" id="color_categoria" name="color">
        </div>
        <button type="submit" class="btn btn-primary">Crear Nueva Categoría</button> 
        </form>
        <div>
            @foreach ($categories as $category)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <li class="list-group-item">
                        <span class="color-container" style="background-color: {{$category->color}}">&nbsp;</span>     
                        <a href="{{route('categories.show', ['category' => $category->id])}}">
                            {{$category->name}}
                        </a>
                        </li>
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$category->id}}">Eliminar</button>
                    </div>
                </div>
                            <!-- Modal -->
            <div class="modal fade" id="modal-{{$category->id}}" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <h3>¿Deseas eliminar esta categoría?. Al eliminar la categoría, también se eliminarán las tareas asociadas</h3>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
            </div>
            @endforeach


        </div>
    </div>

@endsection