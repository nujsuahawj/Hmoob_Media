@extends('layouts.admin')
@section('title', 'Create new post')
@section('content')
<div class="card v-form">
    <div class="card-body">
      <form action="{{ route('store_post') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
              <label>{{__('Title :')}}<small class="fsgred">*</small></label>
              <input type="text" name="title" class="form-control" required placeholder="Post title">
          </div>
          <div class="imagebox d-none p-3 mb-3 bg-light">
              <img id="preview_image" src="#" width="250" height="150">
          </div>
          <div class="form-group">
            <label>{{__('Image : ')}}<small class="fsgred">*</small></label>
            <input type="file" name="image" id="image" class="form-control" required style="height: 36px">
          </div>
          <div class="form-group">
            <label>{{__('Category :')}}<small class="fsgred">*</small></label>
            <select name="category" class="form-select" required>
                <option value="" selected disabled>{{__('Choose')}}</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>{{__('Short description (Max 200 character) :')}} <small class="fsgred">*</small></label>
            <textarea name="short_description" class="form-control" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <label>{{__('Content :')}}<small class="fsgred">*</small></label>
            <textarea name="content" rows="10" id="content"></textarea>
          </div>
          <button class="btn btn-primary">{{__('Publish')}}</button>
      </form>
    </div>
</div>
@endsection