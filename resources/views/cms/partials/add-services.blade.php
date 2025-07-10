<h2 style="color:  #0b3663">{{__('ADD SERVICES')}}</h2>
<div class="dodaj-robu" >
    <div class="row services-wrapper">
        <div class="col-md-12 col-full-xl">
            <select name="lista_klijenata" class="default_select"  id="lista_robe">
                <option value="----">{{__('Select the goods')}}</option>
                @if($goods->count() > 0)
                @foreach ($goods as $goods)
                <option value="{{ $goods->id }}">{{ $goods->name }}</option>
                @endforeach
                @else
                <option value="----">{{__('There are no goods in stock yet')}}</option>
                @endif
            </select>
        </div>
        <div class="col-md-2">
            <label for="">{{__('Title')}}</label>
            <input type="text" name="naziv" id="naziv" value="{{old('name')}}" class="default_input">
        </div>
        <div class="col-md-2">
            <label for="">{{__('Price')}}</label>
            <input type="text" name="cena" id="cena" value="{{ old('price') }}" class="default_input">
        </div>
        <div class="col-md-2">
            <label for="">{{__('Quantity')}}</label>
            <input type="text" name="kolicina" id="kolicina" value="{{ old('kolicina') }}" class="default_input">
        </div>
        <div class="col-md-2">
            <label for="">{{__('Unit of meas.')}}</label>
            <input type="text" name="mjerna_jedinica" id="mjerna_jedinica" value="{{ old('mjerna_jedinica') }}" class="default_input">
        </div>
        <div class="col-md-2">
            <label for=""> {{__('Confirm')}}</label>
            <input class="add_btn" type="button" name="spremi" value="Potvrdi">
        </div>
    </div>
</div>