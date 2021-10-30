@extends('layouts.admin')
@section('title', 'Edit feature')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="preview_box bg-light mb-3 text-center p-3">
            <img src="{{ asset('images/features/'.$feature->image) }}" id="feature_image" width="100px">
        </div>
        <form action="{{ route('store_edit_feature', $feature->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="slug">{{__('Feature image :')}} <span class="fsgred">*</span></label>
                <input type="file" name="image" id="fe_image" class="form-control">
            </div>
            <div class="form-group">
              <label for="title">{{__('Feature title :')}} <span class="fsgred">*</span></label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required value="{{ $feature->title }}">
            </div>
            <div class="form-group">
                <label for="title">{{__('Feature title :')}} <span class="fsgred">*</span></label>
                <textarea name="description" class="form-control" rows="5" placeholder="Enter description" required>{{ $feature->description }}</textarea>
              </div>
            <button class="btn btn-primary">{{__('Save feature')}}</button>
        </form>
    </div>
</div>
@endsection