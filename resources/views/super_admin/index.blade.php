@extends('layouts.topbar')
@section('content')
<html>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <form action="{{ route('users.search') }}">
                    <input type="text" name="search">
                    <button type="submit" class="btn btn-primary">Keresés</button>
                </form>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <?php 
                $users1 = DB::select('SELECT * from users WHERE role=1');
                ?>
                @foreach ($users1 as $user1)
                <tr>
                    <td>
                        {{ $user1->name ?? false}}
                    </td>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('App\Http\Controllers\SuperAdminController@role') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user1->id }}">
                        <select onchange="this.form.submit()" name="status" value="{{ $user1->role }}">
                            <option value="2">Szuper Admin</option>
                            <option value="0">Felhasználó</option>
                            <option value="1">Admin</option>
                        </select>  
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <?php 
                $users2 = DB::select('SELECT * from users WHERE role=2');
                ?>
                @foreach ($users2 as $user2)
                <tr>
                    <td>
                        {{ $user2->name ?? false}}
                    </td>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('App\Http\Controllers\SuperAdminController@status') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user2->id }}">
                        <select onchange="this.form.submit()" name="status" value="{{ $user2->role }}">
                            <option value="2">Szuper Admin</option>
                            <option value="0">Felhasználó</option>
                            <option value="1">Admin</option>
                        </select>  
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
</html>
@endsection