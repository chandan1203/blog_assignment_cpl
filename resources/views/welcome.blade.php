@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}
                    <div class="row float-right">
                        <div class="col-md-6">

                            <form action="{{ route('search') }}" method="get">
                                @csrf
                                <div class="input-group">
                                    <input type="search" name="keywords" class="form-control rounded" placeholder="Search" aria-label="Search"
                                    aria-describedby="search-addon" value="{{ @$keywors }}"/>
                                    <button type="submit" class="btn btn-outline-primary">search</button>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-6 form-inline">
                            {{-- <p>Author</p> --}}
                                <select name="" id="author_filter" class="form-control" onclick="filter()">
                                    <option value="">Select Author</a></option>
                                    @foreach ($authors as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</a></option>
                                    @endforeach
                                </select>
                        </div>
                        {{-- <div class="col-md-3">
                            <select name="" id="" class="form-control">
                                <option value="">Select Category</a></option>
                                @foreach ($categories as $item)
                                    <option value=""><a href="#">{{ $item->name }}</a></option>
                                @endforeach

                            </select>
                        </div> --}}
                      </div>

                </div>
                <div id="post-section">
                @foreach ($posts as $item)
                    <div class="card-body">
                        <h5 class="card-title">Title: {{ $item->title }}</h5>
                        <p class="card-text">Body: {{ Str::limit($item->body, 50) }}</p>
                        <p class="card-text">Category:
                            @foreach ($item->categories as $category)
                                {{ $category->name .',' }}
                            @endforeach
                        </p>
                        <p class="card-text">Author: {{ $item->user->name }}</p>
                    </div>
                    <hr>
                @endforeach
                {{ $posts->links() }}
                </div>


            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('All Categories') }}</div>
                <div class="card-body">
                    @foreach ($categories as $item)
                        <a href="{{ route('category-post', $item->id) }}"><p class="card-text">{{ $item->name }}</p></a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    function filter(id)
    {
        window.location.href = {{ URL::action('PostController@AuthorPost' +id) }};
    }
</script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$( document ).ready(function() {
    $(document).on('change', '#author_filter', function(){
        var id = $(this).val();
        // alert(invoice);
        $('#post-section').hide();
       $.ajax({
        metohd : 'GET',
        url : 'author-post/'+id,
        data: { id: id},
        success:function(data){
            console.log(data);
            $('#post-section').show();
            $('#post-section').html(data);
            // document.getElementById('delivery_date').value = data.date;
            // document.getElementById('timerange').value = data.time_range;

        }

       })

    });


});
</script>

@endsection
