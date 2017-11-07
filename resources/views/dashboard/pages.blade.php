@extends ('layouts.dashboardLayout') 
 
@section ('content')
<section class="section dashboard">
    <div class="container">
        <h2 class="title is-2">Pages</h2>
        <p><a href="/page/create" target="_blank">New Page</a></p>
        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td><a href="/page/{{ $page->id }}/edit" target="_blank">{{ $page->title }}</a></td>
                    <td>{{ $page->created_at->toDayDateTimeString() }}</td>
                    <td><a class="button" href="/page/{{ $page->id }}/edit" target="_blank">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pages->links() }}
    </div>
</section>
@endsection