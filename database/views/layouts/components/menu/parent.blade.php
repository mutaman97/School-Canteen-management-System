


@if(!empty($menus))
	@php
	$mainMenus=$menus['data'] ?? [];
	
	@endphp
	@foreach ($mainMenus ?? [] as $row)
        <li>
		@if (isset($row->children))
		    
		    <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			{{ $row->text }}  <b class="span-dot"><span class="span-circle"></span></b>
			<div class="drop-icon"><i class="icofont-simple-down"></i></div>
		    </a>
		    
		    <ul class="sub-menu collapse" id="submenu-1-5">
			@foreach($row->children as $childrens)
			@include('theme.resto.components.menu.child', ['childrens' => $childrens])
			@endforeach
		    </ul>
            @else
            <a href="{{ url($row->href) }}" class="text-foot" @if(!empty($row->target)) target="{{ $row->target }}" @endif><i class="uil uil-angle-right-b me-1"></i>{{ $row->text }}
            @if(url()->current() == url($row->href))
			  <b class="span-dot"><span class="span-circle"></span></b>
			@endif
            </a>
            @endif
        
     
        
        </li>
        
 	@endforeach
@endif       