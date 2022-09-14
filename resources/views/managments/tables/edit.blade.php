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
                                    <i class="fas fa-plus"></i> Modify {{ $table->name }}
                                </h3>
                                <form action="{{ url('tables/update', $table->id)}}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <input
                                            type="text" name="name" id="name"
                                            class="form-control"
                                            placeholder="Name"
                                            value="{{  $table->name }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="" disabled>
                                                Available
                                            </option>
                                            <option {{ $table->status === 1 ? "selected" : "" }} value="1">Yes</option>
                                            <option {{ $table->status === 0 ? "selected" : "" }} value="0">No</option>
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
