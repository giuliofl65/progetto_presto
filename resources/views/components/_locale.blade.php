<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="bg-transparent border-0 p-0">
        <img class="rounded-circle object-fit-cover ms-md-3 my-2 my-md-0" src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="24" height="24">
    </button>
</form>