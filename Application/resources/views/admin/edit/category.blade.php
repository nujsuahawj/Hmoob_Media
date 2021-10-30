@extends('layouts.admin')
@section('title', 'Edit category'. $category->category_name)
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store_edit_category', $category->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>{{__('Category name : ')}} <span class="fsgred">*</span></label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter name" required value="{{ $category->category_name }}">
                    </div>
                    <button class="btn btn-primary">{{__('Save changes')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection