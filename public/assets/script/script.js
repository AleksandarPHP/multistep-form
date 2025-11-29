document.addEventListener("DOMContentLoaded", function () {
  const nextBtn = document.querySelector(".btn-next");
  const prevBtn = document.querySelector(".btn-prev");
  const progressBar = document.querySelector(".form-progress-bar");
  const steps = document.querySelectorAll(".form-step");
  const progressSteps = document.querySelectorAll(".form-progress-step");
  const progressWrapper = document.querySelector(".form-progress-wrapper");

  let currentStep = 0;
  const totalSteps = 7;

  updateButtonState();

  nextBtn.addEventListener("click", goToNextStep);
  prevBtn.addEventListener("click", goToPrevStep);

  function initRangeSliders() {
    function updateRangeColor(range) {
      const min = parseInt(range.min) || 1;
      const max = parseInt(range.max) || 5;
      const value = parseInt(range.value) || 3;
      const percentage = ((value - min) / (max - min)) * 100;
      range.style.setProperty("--value", `${percentage}%`);
    }

    const rangeSliders = document.querySelectorAll('input[type="range"]');

    rangeSliders.forEach((rangeSlider) => {
      const container =
        rangeSlider.closest(".range-slider").parentElement.parentElement;
      const numberInput = container.querySelector('input[type="number"]');

      if (numberInput) {
        updateRangeColor(rangeSlider);

        rangeSlider.addEventListener("input", function () {
          numberInput.value = this.value;
          updateRangeColor(this);
        });

        numberInput.addEventListener("input", function () {
          rangeSlider.value = this.value;
          updateRangeColor(rangeSlider);
        });
      }
    });
  }

  const formSelectionBtns = document.querySelectorAll(".form-selection-btn");
  formSelectionBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const parentRow = this.closest(".row");
      parentRow.querySelectorAll(".form-selection-btn").forEach((b) => {
        b.classList.remove("selected");
      });

      this.classList.add("selected");
    });
  });

  function goToNextStep() {
    if (currentStep < totalSteps - 1) {
      document
        .querySelector(`.form-step[data-step="${currentStep}"]`)
        .classList.remove("active");

      currentStep++;

      if (
        currentStep > 0 &&
        currentStep < totalSteps - 1 &&
        currentStep !== 6
      ) {
        progressWrapper.style.display = "block";
      } else if (currentStep === 6) {
        progressWrapper.style.display = "none";
      }

      document
        .querySelector(`.form-step[data-step="${currentStep}"]`)
        .classList.add("active");

      if (currentStep > 0) {
        progressSteps.forEach((step, index) => {
          step.classList.remove("active");
          step.classList.remove("completed");
        });

        if (currentStep < progressSteps.length - 1) {
          progressSteps[currentStep - 1].classList.add("active");
        }

        for (let i = 0; i < currentStep - 1; i++) {
          progressSteps[i].classList.add("completed");
        }
      }

      updateProgressBar();
      updateButtonState();
    }
  }

  function goToPrevStep() {
    if (currentStep > 0) {
      document
        .querySelector(`.form-step[data-step="${currentStep}"]`)
        .classList.remove("active");

      currentStep--;

      if (currentStep === 0 || currentStep === 7) {
        progressWrapper.style.display = "none";
      } else {
        progressWrapper.style.display = "block";
      }

      document
        .querySelector(`.form-step[data-step="${currentStep}"]`)
        .classList.add("active");

      if (currentStep > 0) {
        progressSteps.forEach((step, index) => {
          step.classList.remove("active");
          step.classList.remove("completed");
        });

        progressSteps[currentStep - 1].classList.add("active");

        for (let i = 0; i < currentStep - 1; i++) {
          progressSteps[i].classList.add("completed");
        }
      }

      updateProgressBar();
      updateButtonState();
    }
  }

  function updateProgressBar() {
    if (currentStep > 0) {
      const numberOfProgressSteps = progressSteps.length;

      const segmentWidth = 1 / (numberOfProgressSteps - 1);

      let progressPercentage;

      if (currentStep === 1) {
        progressPercentage = 0;
      } else {
        progressPercentage =
          ((currentStep - 1) / (numberOfProgressSteps - 1)) * 100;
      }

      const clampedPercentage = Math.min(progressPercentage, 100);
      progressBar.style.width = `${clampedPercentage}%`;
    }
  }

  function updateButtonState() {
    prevBtn.disabled = currentStep === 0;
    nextBtn.textContent =
      currentStep === totalSteps - 1 ? "Abschließen" : "Weiter";
    if (nextBtn.textContent === "Weiter") {
      nextBtn.type = "button";
    } else {
      nextBtn.type = "submit";
    }
  }
});

$(".card-option").click(function() {
  $(".card-option").removeClass('selected');
  $(this).addClass('selected')
  $(this).parent().find('input').prop('checked', true)
  showOptionItems($(this).data('id'))
});

$(".produktePosition").click(function() {
  $(".produktePosition").removeClass('selected');
  $(this).addClass('selected')
  $(this).parent().find('input').prop('checked', true)
});

$(".card-home").click(function() {
  $(".card-home").removeClass('selected');
  $(this).addClass('selected')
  $(this).parent().find('input').prop('checked', true)
});

var loadingAddToCart = false;
function showOptionItems(id) {
  if(loadingAddToCart === false) {  
    $.ajax({
      url: "/show-options",
      method: 'POST',
      headers: { 'Accept': 'application/json' },
      data: {id: id, _token: $('meta[name="csrf-token"]').attr('content')},
      success: function(data) {
        
        $('#options-list').html(data.options);
        loadingAddToCart = false;
      }, error: function(data) {              
        var message = data.responseJSON.message;
        if(message == '') message = errorMessage;
        if(type == 'default') {
          element.removeClass('loading');
          element.prop('disabled', false);
        } else if(type == 'wish') {
          $('body').removeClass('body_loading');
        }
        $('#product_modal .alert-danger').text(message).show();
        $('#product_modal').modal();
        loadingAddToCart = false;
      }
    });

    $.ajax({
      url: "/show-accessories",
      method: 'POST',
      headers: { 'Accept': 'application/json' },
      data: {id: id, _token: $('meta[name="csrf-token"]').attr('content')},
      success: function(data) {
        
        $('#accessories-list').html(data.accessories);
        loadingAddToCart = false;
      }, error: function(data) {              
        var message = data.responseJSON.message;
        if(message == '') message = errorMessage;
        if(type == 'default') {
          element.removeClass('loading');
          element.prop('disabled', false);
        } else if(type == 'wish') {
          $('body').removeClass('body_loading');
        }
        $('#product_modal .alert-danger').text(message).show();
        $('#product_modal').modal();
        loadingAddToCart = false;
      }
    });

    $.ajax({
      url: "/show-colors",
      method: 'POST',
      headers: { 'Accept': 'application/json' },
      data: {id: id, _token: $('meta[name="csrf-token"]').attr('content')},
      success: function(data) {
        
        $('#colors-list').html(data.colors);
        loadingAddToCart = false;
      }, error: function(data) {              
      }
    });

    $.ajax({
      url: "/show-surfaces",
      method: 'POST',
      headers: { 'Accept': 'application/json' },
      data: {id: id, _token: $('meta[name="csrf-token"]').attr('content')},
      success: function(data) {
      
      $('#surfaces-list').html(data.surfaces);
        loadingAddToCart = false;
      }, error: function(data) {              
        loadingAddToCart = false;
      }
    });
  }
}
