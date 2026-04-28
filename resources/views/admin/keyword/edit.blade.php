    @extends('layouts.adminlayout')
    @section('title')
        Home
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">{{$keyword->name}}</h2>
                <div class="card p-4">
                    <div class="col-md-4 border p-4 rounded">
                        <form action="{{route('admin.keyword.update',$keyword->slug)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Name*</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    id="name"
                                    aria-describedby="helpId"
                                    placeholder="Please enter a name*"
                                    value="{{$keyword->name,old('name')}}"
                                />
                                @error('name')
                                    {{$message}}    
                                @enderror
                            </div>
                            <div class="mb-3 text-end">
                                <button class="btn btn-success btn-sm">
                                    <i class="bi bi-arrow-counterclockwise"></i> Update
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection