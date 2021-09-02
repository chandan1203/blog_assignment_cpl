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
</div>
