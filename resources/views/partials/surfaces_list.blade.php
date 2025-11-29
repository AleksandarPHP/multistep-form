<div data-step="4" id="surfaces-list">
    @foreach ($surfaces as $surface)
                <div class="row mt-5">
                  <div class="col-12">
                    <div class="floor-selection">
                      <h3 class="form-section-title">
                            {{ $surface->title }}
                      </h3>
                      <div class="row align-items-center mt-4">
                        <div class="col-md-3 col-sm-4">
                          <div class="form-group">
                            <input
                              type="number" 
                              class="form-control text-center" 
                              value="{{ $surface->default_value }}" 
                              name="surface[{{ $surface->id }}]" 
                              min="{{ $surface->value_from }}" 
                              max="{{ $surface->value_to }}" 
                              step="0.1"
                            />
                          </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                          <div class="range-slider d-flex align-items-center">
                            <span class="range-value me-2">{{ $surface->value_from }}</span>
                            <input
                              type="range"
                              class="form-range"
                              min="{{ $surface->value_from }}"
                              max="{{ $surface->value_to }}"
                              value="{{ $surface->default_value }}"
                              step="0.1"
                              id="floorRange1"
                            />
                            <span class="range-value ms-2">{{ $surface->value_to }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>        
    @endforeach
</div>
<script>
document.addEventListener('input', function (e) {
    if (e.target.matches('input[type="range"]')) {
        const group = e.target.closest('.row');
        if (!group) return;

        const number = group.querySelector('input[type="number"]');
        if (number) number.value = e.target.value;
    }
});

document.addEventListener('input', function (e) {
    if (e.target.matches('input[type="number"]')) {
        const group = e.target.closest('.row');
        if (!group) return;

        const range = group.querySelector('input[type="range"]');
        if (range) {
            let min = parseFloat(e.target.min);
            let max = parseFloat(e.target.max);
            let val = parseFloat(e.target.value);

            if (val < min) val = min;
            if (val > max) val = max;

            e.target.value = val;
            range.value = val;
        }
    }
});
</script>