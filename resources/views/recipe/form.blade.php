<div class="form-group">
    <label for="title">Nama User</label>
        <select id="select_user" name="select_user" class="form-control editor">
            @foreach ($users as $us)
                <option value="{{$us->id}}">{{$us->name}}</option>
            @endforeach
        </select>
</div>
<div class="form-group">
    <label for="">Nama Recipe</label>
    <input type="text" class="form-control" name="nama_recipe" id="nama_recipe">
</div>
<div class="form-group">
    <label for="">Cara Masak</label>
    <textarea class="form-control editor" name="cara_masak" id="cara_masak" cols="8" rows="3"></textarea>
</div>
<div class="form-group">
    <label for="">Bahan</label>
    <input class="form-control" id="bahan_0" name="bahan[]" type="text">
    <input class="form-control" id="bahan_1" name="bahan[]" type="text">
    <input class="form-control" id="bahan_2" name="bahan[]" type="text">
    <input class="form-control" id="bahan_3" name="bahan[]" type="text">
    <input class="form-control" id="bahan_4" name="bahan[]" type="text">
</div>