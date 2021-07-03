<div class="table-pagination-outer-div">
    <nav class="table-pagination"  aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item page-item-text">
                <span class="show-on-page">Show on page </span>
                <b> {{$paginator->currentPage()}}- {{$paginator->perPage()}}  </b>
                <span class="show-on-page"> out of {{$paginator->total()}} </span>
            </li>
            <li class="page-item">
                <a class="page-link {{$paginator->previousPageUrl() == null ? 'href-disable': ''}}"
                   href="{{$paginator->previousPageUrl()}}" aria-label="Previous">
                        <span aria-hidden="true" class="{{$paginator->previousPageUrl() == null ? '': 'active'}}"><i
                                class="fa fa-chevron-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link {{$paginator->nextPageUrl() == null ? 'href-disable': ''}}"
                   href="{{$paginator->nextPageUrl()}}"
                   aria-label="Next" {{$paginator->nextPageUrl() == null ? 'disabled': ''}}>
                        <span aria-hidden="true" class="{{$paginator->nextPageUrl() == null ? '': 'active'}}"><i
                                class="fa fa-chevron-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
