@extends('layouts.admin')
@section('title', 'Extension Icons')
@section('content')
<div class="card">
   <div class="card-header">
      <h2 class="m-0">{{__('All icons')}} </h2>
      <span class="col-auto ms-auto d-print-none">
         <a href="{{ route('add.icon') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <circle cx="12" cy="12" r="9" />
               <line x1="9" y1="12" x2="15" y2="12" />
               <line x1="12" y1="9" x2="12" y2="15" />
            </svg>
            {{__('New Icon')}}
         </a>
      </span>
   </div>
   <div class="card-body">
      <table id="basic-datatables" class="display table table-striped table-bordered" >
         <thead>
            <tr>
               <th class="text-center">{{__('#ID')}}</th>
               <th class="text-center">{{__('Icon preview')}}</th>
               <th class="text-center">{{__('Icon name')}}</th>
               <th class="text-center">{{__('Created date')}}</th>
               <th class="text-center">{{__('Delete')}}</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($icons as $icon)
            <tr>
               <td class="text-center">{{ $icon->id }}</td>
               <td class="text-center"><img src="{{ url('images/icons/'.$icon->icon_path) }}" alt="{{ $icon->icon_name }}" width="40px"></td>
               <td class="text-center">{{ $icon->icon_name }}</td>
               <td class="text-center">{{ date("d/m/y  H:i A", strtotime($icon->created_at))}}</td>
               <td class="text-center">
                  <form action="{{ route('delete.icon', $icon->id) }}" method="POST">
                     @csrf
                     @method('delete')
                     <button class="btn btn-danger btn-sm">
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