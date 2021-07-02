<a href="{{$paginator->nextPageUrl()}}">Next</a>
<a href="{{$paginator->previousPageUrl()}}">Previous</a>
<h1>Total Record {{$paginator->total()}}</h1>
<h1>Per Page {{$paginator->perPage()}}</h1>
<h1>Current Page {{$paginator->currentPage()}}</h1>
