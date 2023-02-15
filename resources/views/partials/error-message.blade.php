<div class="d-flex flex-column mt-1">
    @foreach ($errors->all() as $error)
       <label class="text-danger">{{ $error }}</label>
    @endforeach
</div>
