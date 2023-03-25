<!DOCTYPE html>
<style>
    .topbar{
        float: left;
    }
</style>
<html>
    <div class="topbar">
        <form action="{{ route('search') }}">
            <input type="text" name="search">
            <button type="submit"></button>
        </form>
    </div>
    <br>
</html>