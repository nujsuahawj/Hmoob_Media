@extends('layouts.admin')
@section('title', 'Text and button')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('textButton_store') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="wasabi_access_key_id">{{__('Title :')}} <span class="fsgred">*</span></label>
            <input type="text" name="center_text" value="{{ $home_settings->center_text }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="wasabi_access_key_id">{{__('Button :')}} <span class="fsgred">*</span></label>
            <input type="text" name="center_button" value="{{ $home_settings->center_button }}" class="form-control">
          </div>
          <button class="btn btn-primary">{{__('Save changes')}}</button>
        </form>
    </div>
</div>
@endsection