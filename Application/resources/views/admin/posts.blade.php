@extends('layouts.admin')
@section('title', 'Blog posts')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="m-0">{{__('All posts')}} </h2>
        <span class="col-auto ms-auto d-print-none">
           <a href="{{ route('create_post') }}" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                 <circle cx="12" cy="12" r="9" />
                 <line x1="9" y1="12" x2="15" y2="12" />
                 <line x1="12" y1="9" x2="12" y2="15" />
              </svg>
              {{__('New post')}}
           </a>
        </span>
     </div>
    <div class="card-body">
        <table id="basic-datatables" class="display table table-striped table-bordered" >
            <thead>
               <tr>
                  <th>{{__('#ID')}}</th>
                  <th class="text-center">{{__('Image')}}</th>
                  <th class="text-center">{{__('Title')}}</th>
                  <th class="text-center">{{__('Created date')}}</th>
                  <th class="text-center">{{__('Edit / Delete')}}</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
               <tr>
                  <td>{{ $post->id }}</td>
                  <td class="text-center"><img src="{{ asset('images/blog/'.$post->image) }}" alt="{{ $post->title }}" width="60" height="40"></td>
                  <td class="text-center">{{ $post->title }}</td>
                  <td class="text-center">@datetime($post->created_at)</td>
                  <td class="text-center">
                     <a href="{{ route('edit_post', $post->id) }}" class="btn btn-blue btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                           <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                           <line x1="16" y1="5" x2="19" y2="8" />
                        </svg>
                     </a>
                     <form action="{{ route('post_destroy', $post->id) }}" method="POST" style="display: initial;">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                               <line x1="4" y1="7" x2="20" y2="7" />
                               <line x1="10" y1="11" x2="10" y2="17" />
                               <line x1="14" y1="11" x2="14" y2="17" />
                               <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                               <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                         </button>
                    </form>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
    </div>
</div>
@endsection