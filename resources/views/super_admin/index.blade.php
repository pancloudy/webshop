@extends('layouts.topbar')
@section('content')



    <body>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <th>Felhasználók</th>
                <?php
                    if(isset($_GET['search'])){
                        if(empty($_GET['search'])){
                            echo "<script>alert('Kérem írjon is be valamit a kereséshez.')</script>";
                        }
                        $search=$_GET['search'];
                        $users0 = DB::select("SELECT * FROM users WHERE name LIKE '%" . $search . "%' AND role = 0");
                        $check=true;
                    }
                else $check=false?>
                <form action="" method="GET">
                    <input type="text" name="search">
                    <input type="submit" class="btn btn-primary" value="Keresés"></input>
                </form>
                <?php
                if(!$check){
                  $users0 = DB::select('SELECT * from users where role = 0'); 
                }
                ?>
                @foreach ($users0 as $user0)
                <tr>
                    <td>
                        {{ $user0->name ?? false}}
                    </td>
                    <td>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('users.role', $user0->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user0->id }}">
                        <select onchange="this.form.submit()" name="role" value="{{ $user0->role }}">
                            <option value="0">Felhasználó</option>
                            <option value="1">Admin</option>
                            <option value="2">Szuper Admin</option>
                        </select>  
                    </form>
                </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-4">
            <br>
            <table class="table table-bordered table-striped">
                
                <th>Adminok</th>
                <?php 
                $users1 = DB::select('SELECT * from users WHERE role=1');
                ?>
                @foreach ($users1 as $user1)
                
                <tr>
                    <td>
                        {{ $user1->name ?? false}}
                    </td>
                    <td>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('users.role', $user1->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user1->id }}">
                        <select onchange="this.form.submit()" name="role" value="{{ $user1->role }}">
                            <option value="1">Admin</option>
                            <option value="0">Felhasználó</option>
                            <option value="2">Szuper Admin</option>
                        </select>  
                    </form>
                </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-4">
            <br>
            <table class="table table-bordered table-striped">
                <th>Szuper Adminok</th>
                <?php 
                $users2 = DB::select('SELECT * from users WHERE role=2');
                ?>
                @foreach ($users2 as $user2)
                <tr>
                    <td>
                        {{ $user2->name ?? false}}
                    </td>
                    <td>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('users.role', $user2->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user2->id }}">
                        <select onchange="this.form.submit()" name="role" value="{{ $user2->role }}">
                            <option value="2">Szuper Admin</option>
                            <option value="0">Felhasználó</option>
                            <option value="1">Admin</option>
                        </select>  
                    </form>
                </td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
    </body>

@endsection