@extends('app')

@section('contents')
    {!! $dataTable->table() !!}
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
<script type="text/javascript">
	
	function hello(user_id) {
	
	if(confirm('Are you sure want to delete'))
	{		
			alert(user_id);
	}
	return false;
	}
</script>
