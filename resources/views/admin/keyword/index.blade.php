    @extends('layouts.adminlayout')
    @section('title')
        Home
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Keywords</h2>
                <div class="card p-4">
                    <div class="col-md-4">
                        <table class="table table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <tr>
                                        <th colspan="4">
                                            <a href="{{route('admin.keyword.create')}}">
                                                <button class="btn btn-success">
                                                    <i class="bi bi-plus"></i> Add Keywords
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                </tr>
                                <tr>
                                    <th>*</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keywords as $key => $keyword)
                                    <tr>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$keyword->name}}</td>
                                        <td>{{$keyword->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.keyword.edit',$keyword->slug)}}">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="bi bi-wrench"></i>
                                                </button>
                                            </a>
                                            <a href="#" onclick="deleteItem({{$keyword->id}})" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="{{$keyword->id}}" action="{{route('admin.keyword.destroy',$keyword->slug)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    @endsection