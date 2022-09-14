@extends('layouts.app')


@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="border : 3px solid #ADD8E6">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"></i> Modify category {{ $category->title }}
                                </h3>
                                <form action="{{ url('categories/update', $category->id) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <input
                                            type="text" name="title" id="title"
                                            class="form-control"
                                            placeholder="Title"
                                            value="{{$category->title }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                           Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
