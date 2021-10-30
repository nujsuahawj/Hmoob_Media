@extends('layouts.admin')
@section('title', 'Add icon')
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="preview_box bg-light mb-3 text-center p-3 d-none">
                    <img src="#" id="icon_preview" width="200px">
                </div>
                <form action="{{ route('add.icon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">{{__('icon name (png, jpg, gif, etc....) :')}} <span class="fsgred">*</span></label>
                      <input type="text" name="icon_name" id="icon_name" class="form-control" placeholder="Enter icon name" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">{{__('icon image :')}} <span class="fsgred">*</span></label>
                        <input type="file" name="icon_path" id="icon_path" class="form-control" accept="image/png" required>
                    </div>
                    <button class="btn btn-primary">{{__('Add icon')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection