    @extends('layouts.adminlayout')
    @section('title')
        Home
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Articles</h2>
                <div class="card p-4">
                    <div class="col-md-4">
                        <table class="table table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <tr>
                                        <th colspan="4">
                                            <a href="{{route('admin.article.create')}}">
                                                <button class="btn btn-success">
                                                    <i class="bi bi-plus"></i> Add Article
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                </tr>
                                <tr>
                                    <th>*</th>
                                    <th>Title</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $key => $article)
                                    <tr>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$article->title}}</td>
                                        <td>
                                            <a href="{{route('admin.article.edit',$article->id)}}">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="bi bi-wrench"></i>
                                                </button>
                                            </a>
                                            <a href="#" onclick="deleteItem({{$article->id}})" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="{{$article->id}}" action="{{route('admin.article.destroy',$article->id)}}" method="POST">
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