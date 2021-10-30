@extends('layouts.admin')
@section('title', 'Hero background')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="hero_box bg-light p-4 mb-3">
            <img id="hero_image" src="{{ asset('images/sections/'.$home_settings->hero) }}" width="200px">
        </div>
        <form action="{{ route('hero_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="wasabi_access_key_id">{{__('Background image :')}} <span class="fsgred">*</span></label>
            <input id="hero_upload" type="file" name="hero"class="form-control" required>
            <small class="text-muted">{{__('Must be 622x948')}}</small>
          </div>
          <button class="btn btn-primary">{{__('Save changes')}}</button>
        </form>
    </div>
</div>
@endsection