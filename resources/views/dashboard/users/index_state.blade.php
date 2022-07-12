@if ($user->active == true)
    <span class="badge badge-success">Active</span>
@else
    <span class="badge badge-danger">Blocked</span>
@endif