@foreach ($user->roles as $role)
    @if ($role->name == 'Admin')
        <span class="badge badge-success">Admin</span>
    @elseif ($role->name == 'Partner')
        <span class="badge badge-primary">Partner</span>
    @elseif ($role->name == 'Operator')
        <span class="badge badge-secondary">Operator</span>
    @endif
@endforeach