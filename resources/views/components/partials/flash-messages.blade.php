{{ $icons = ['info'=>'info-circle' , 'success'=> 'check-circle',
'warning' => 'exclamation-circle' ]; }}
{{ $flashes = session('flash');}}
@if ( count($flashes)>0 )
   
<div class="toast-notification">
 @for ( $flashes as $flash )
     
 <div class="toast" id="toast-{{ $flash['type'] }}-{{ $loop->iteration }}" role="alert" aria-live="assertive"
 aria-atomic="true" data-delay="3200">
<div class="toast-header">
    <strong class="mr-auto"><i
                class="fas fa-{{ $icons[$type] ?? 'times-circle' }}"></i> {{ $flash['title'] }}</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="toast-body">
    {{ $flash['message'] }}
</div>
</div>

 @endfor



@endif


