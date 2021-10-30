@extends('layouts.admin')
@section('title', 'Edit : '.$post->title)
@section('content')
<div class="card v-form">
    <div class="card-body">
      <form action="{{ route('store_edit_post', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
          <div class="form-group">
              <label>{{__('Title :')}}<small class="fsgred">*</small></label>
              <input type="text" name="title" class="form-control" required placeholder="Post title" value="{{ $post->title }}">
          </div>
          <div class="imagebox p-3 mb-3 bg-light">
              <img id="preview_image" src="{{ asset('images/blog/'.$post->image) }}" width="250" height="150">
          </div>
          <div class="form-group">
            <label>{{__('Image : ')}} </label>
            <input type="file" name="image" id="image" class="form-control">
          </div>
          <div class="form-group">
            <label>{{__('Category :')}}<small class="fsgred">*</small></label>
            <select name="category" class="form-select" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $post->category) selected @endif>{{ $category->category_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>{{__('Short description (Max 200 character) :')}} <small class="fsgred">*</small></label>
            <textarea name="short_description" class="form-control" rows="4" required>{{ $post->short_description }}</textarea>
          </div>
          <div class="form-group">
            <label>{{__('Content :')}}<small class="fsgred">*</small></label>
            <textarea name="content" rows="10" id="content">{{ $post->content }}</textarea>
          </div>
          <button class="btn btn-primary">{{__('Save changes')}}</button>
      </form>
    </div>
</div>
@endsection