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
                                    <i class="fas fa-plus"></i> Modify the menu{{ $menu->title }}
                                </h3>
                                <form action="{{ url('menus/update',$menu->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <input
                                            type="text" name="title" id="title"
                                            class="form-control"
                                            placeholder="Title"
                                            value="{{ $menu->title }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <textarea
                                            name="description" id="description"
                                            rows="5"
                                            cols="30"
                                            class="form-control"
                                            placeholder="Description"
                                        >{{ $menu->description }}</textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                N
                                            </div>
                                        </div>
                                        <input type="number"
                                            name="price"
                                            class="form-control"
                                            placeholder="Price"
                                            value="{{ $menu->price }}"
                                        >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <img src="{{ asset('images/menus/'.$menu->image) }}"
                                            width="200"
                                            height="200"
                                            class="img-fluid"
                                            alt="{{ $menu->title }}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Image
                                            </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                name="image"
                                                class="custom-file-input"
                                            >
                                            <label class="custom-file-label">
                                                2mg max
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected disabled>Choose a Category</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    {{ $category->id === $menu->category->id ? "selected" : ""}}
                                                    value="{{ $category->id }}">
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
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
