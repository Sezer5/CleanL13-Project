    @extends('layouts.adminlayout')
    @section('title')
        Home
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Keywords</h2>
                <div class="card p-4">
                    <div class="col-md-4 border p-4 rounded">
                        <form action="{{route('admin.keyword.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name*</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    id="name"
                                    aria-describedby="helpId"
                                    placeholder="Please enter a name*"
                                    value="{{old('name')}}"
                                />
                                @error('name')
                                    {{$message}}    
                                @enderror
                            </div>
                            <div class="mb-3 text-end">
                                <button class="btn btn-success btn-sm">
                                    <i class="bi bi-plus"></i> Add
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection