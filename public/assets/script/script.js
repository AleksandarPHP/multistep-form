document.addEventListener("DOMContentLoaded", function () {
  // DOM Elements
  const nextBtn = document.querySelector(".btn-next");
  const prevBtn = document.querySelector(".btn-prev");
  const progressBar = document.querySelector(".form-progress-bar");
  const progressSteps = document.querySelectorAll(".form-progress-step");
  const progressWrapper = document.querySelector(".form-progress-wrapper");
  const floorSelection = document.getElementById("floorSelection");
  const formSelectionBtns = document.querySelectorAll(".form-selection-btn");
  
  // State
  let currentStep = 0;
  const totalSteps = 7;
  
  // Step mapping for showing/hiding cards in step 2
  const stepMapping = {
    1: ["card-s2", "card-s2-1"],
    2: ["card-s2-2", "card-s2-1"],
    3: ["card-s2-3", "card-s2-4", "card-s2-1"],
    4: ["card-s2-5", "card-s2-6"],
    5: ["card-s2-7"],
    6: ["card-s2-8", "card-s2-9"],
    7: ["card-s2-10", "card-s2-11", "card-s2-12"],
    8: ["card-s2-13"]
  };

  // Initialize
  updateButtonState();
  initRangeSliders();
  initChoiceCards();
  initFormSelectionButtons();
  initStepMapping();

  // Event Listeners
  nextBtn.addEventListener("click", goToNextStep);
  prevBtn.addEventListener("click", goToPrevStep);

  // Functions
  function initRangeSliders() {
    function updateRangeColor(range) {
      const min = parseFloat(range.min) || 1;
      const max = parseFloat(range.max) || 5;
      const value = parseFloat(range.value) || 4;
      const percentage = ((value - min) / (max - min)) * 100;
      range.style.setProperty("--value", `${percentage}%`);
    }

    const rangeSliders = document.querySelectorAll('input[type="range"]');

    rangeSliders.forEach((rangeSlider) => {
      const container = rangeSlider.closest(".range-slider").parentElement.parentElement;
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
  let total = 0; // globalna varijabla

  function initChoiceCards() {
    // Define all card types with their special behaviors
    const cardTypes = [
      { selector: ".card-s0", specialBehavior: null },
      { 
        selector: ".card-s1", 
        specialBehavior: (card, input) => {
          if (input) input.dispatchEvent(new Event("change", { bubbles: true }));
        }
      },
      { 
        selector: ".card-s1-1", 
        specialBehavior: (card, input) => {
          if (input && (input.value === "Dachterrasse" || input.value === "Balkon")) {
            floorSelection.classList.remove("d-none");
          } else {
            floorSelection.classList.add("d-none");
          }
        }
      },
      { selector: ".card-s2", specialBehavior: null },
      { selector: ".card-s2-1", specialBehavior: null },
      { selector: ".card-s2-2", specialBehavior: null },
      { selector: ".card-s2-3", specialBehavior: null },
      { selector: ".card-s2-4", specialBehavior: null },
      { selector: ".card-s2-5", specialBehavior: null },
      { selector: ".card-s2-6", specialBehavior: null },
      { selector: ".card-s2-7", specialBehavior: null },
      { selector: ".card-s2-8", specialBehavior: null },
      { selector: ".card-s2-9", specialBehavior: null },
      { selector: ".card-s2-10", specialBehavior: null },
      { selector: ".card-s2-11", specialBehavior: null },
      { selector: ".card-s2-12", specialBehavior: null },
      { selector: ".card-s2-13", specialBehavior: null },
      { selector: ".card-s3", specialBehavior: null },
      { selector: ".card-s3-1", specialBehavior: null },
      { selector: ".card-s3-2", specialBehavior: null },
      { selector: ".card-s5", specialBehavior: null },
      { selector: ".card-s5a", specialBehavior: null },
      { selector: ".card-s5-1", specialBehavior: null }
    ];

    // Initialize all card types
    cardTypes.forEach(cardType => {
      const cards = document.querySelectorAll(cardType.selector);
      
      // Add click event to each card
      cards.forEach(card => {
        card.addEventListener("click", function () {
          const parentStep = this.closest(".form-step");
          const sameTypeCards = parentStep.querySelectorAll(cardType.selector);
          
          sameTypeCards.forEach(c => {
            c.classList.remove("selected");
            const input = c.querySelector('input[type="radio"]');
            if (input && input.checked) {
              oldPrice = +input.dataset.price;
              input.checked = false;
            }
          });

          this.classList.add("selected");
          const input = this.querySelector('input[type="radio"]');
          
          if (input) {
            input.checked = true;
            let cardPrice = +input.dataset.price;
            console.log(cardPrice);
            
            totalPtice(cardPrice, oldPrice);
            if (cardType.specialBehavior) {
              cardType.specialBehavior(this, input);
            }
          }
        });
      });

      // Select first card of each type by default
      document.querySelectorAll(".form-step").forEach(step => {
        const firstCard = step.querySelector(cardType.selector);
        if (firstCard) {
          firstCard.classList.add("selected");
          const input = firstCard.querySelector('input[type="radio"]');
          if (input) {
            input.checked = true;
            
            if (cardType.specialBehavior) {
              cardType.specialBehavior(firstCard, input);
            }
          }
        }
      });
    });
  }

  function totalPtice(price, oldPrice) {
    console.log('total', total);
    
    if (total == 0) {
      oldPrice = 0;
    }
    console.log('old', oldPrice);
    
    // sabira sve pozive    
    if(!isNaN(price)){
      total += price;
    }

    if(!isNaN(oldPrice)){
      total = total - oldPrice;
    }
    console.log(total);

    let minPrice, maxPrice = 0;

    if (total !== 0) {
      minPrice = total - 500;
      maxPrice = total + 800;
    }

    // formatiraj kao EUR
    let formattedMin = minPrice.toLocaleString("de-DE", {
      style: "currency",
      currency: "EUR",
      minimumFractionDigits: 0
    });

    let formattedMax = maxPrice.toLocaleString("de-DE", {
      style: "currency",
      currency: "EUR",
      minimumFractionDigits: 0
    });

    // upiši u span
    document.getElementById("price-value-min").innerText = formattedMin;
    document.getElementById("price-value-max").innerText = formattedMax;

    console.log("Ukupno:", total);
  }

  function initFormSelectionButtons() {
    formSelectionBtns.forEach(btn => {
      btn.addEventListener("click", function (e) {
        e.preventDefault();

        const parentRow = this.closest(".row");
        parentRow.querySelectorAll(".form-selection-btn").forEach(b => {
          b.classList.remove("selected");
        });

        this.classList.add("selected");
        const input = this.nextElementSibling;
        
        if (input && input.type === "radio") {
          input.checked = true;
        }
      });
    });

    // Select first button by default
    document.querySelectorAll(".row").forEach(row => {
      const firstBtn = row.querySelector(".form-selection-btn");
      if (firstBtn) {
        firstBtn.classList.add("selected");
        const input = firstBtn.nextElementSibling;
        if (input && input.type === "radio") {
          input.checked = true;
        }
      }
    });
  }

  function initStepMapping() {
    const allSecondStepCards = document.querySelectorAll("[id^='card-s2']");
    const radios = document.querySelectorAll("input[name='product']");

    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        // Hide all second step cards
        allSecondStepCards.forEach(card => card.classList.add("d-none"));

        // Show only the mapped cards
        const selectedId = this.id;
        const toShow = stepMapping[selectedId] || [];
        
        toShow.forEach(blockId => {
          const block = document.getElementById(blockId);
          if (block) block.classList.remove("d-none");
        });
      });
    });
  }

  function goToNextStep() {
    if (currentStep < totalSteps - 1) {
      document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove("active");
      currentStep++;

      // Show/hide progress wrapper
      if (currentStep > 0 && currentStep < totalSteps - 1 && currentStep !== 6) {
        progressWrapper.style.display = "block";
      } else if (currentStep === 6) {
        progressWrapper.style.display = "none";
      }

      document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add("active");

      // Update progress steps
      if (currentStep > 0) {
        progressSteps.forEach(step => {
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
      document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove("active");
      currentStep--;

      // Show/hide progress wrapper
      if (currentStep === 0 || currentStep === 7) {
        progressWrapper.style.display = "none";
      } else {
        progressWrapper.style.display = "block";
      }

      document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add("active");

      // Update progress steps
      if (currentStep > 0) {
        progressSteps.forEach(step => {
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
        progressPercentage = ((currentStep - 1) / (numberOfProgressSteps - 1)) * 100;
      }

      const clampedPercentage = Math.min(progressPercentage, 100);
      progressBar.style.width = `${clampedPercentage}%`;
    }
  }

  function updateButtonState() {
    prevBtn.disabled = currentStep === 0;
    nextBtn.textContent = currentStep === totalSteps - 1 ? "Abschließen" : "Weiter";
    nextBtn.type = currentStep === totalSteps - 1 ? "submit" : "button";
  }
});