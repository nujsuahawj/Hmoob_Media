@extends('layouts.admin')
@section('title', 'Create category')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store_category') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>{{__('Category name : ')}} <span class="fsgred">*</span></label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <button class="btn btn-primary">{{__('Create category')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection