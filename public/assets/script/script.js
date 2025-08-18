document.addEventListener("DOMContentLoaded", function () {
  const nextBtn = document.querySelector(".btn-next");
  const prevBtn = document.querySelector(".btn-prev");
  const progressBar = document.querySelector(".form-progress-bar");
  const steps = document.querySelectorAll(".form-step");
  const progressSteps = document.querySelectorAll(".form-progress-step");
  const progressWrapper = document.querySelector(".form-progress-wrapper");
  const choiceCards = document.querySelectorAll(".choice-card");
  const choiceCardsS0 = document.querySelectorAll(".card-s0");
  const choiceCardsS1 = document.querySelectorAll(".card-s1");
  const choiceCardsS1_1 = document.querySelectorAll(".card-s1-1");
  const choiceCardsS2 = document.querySelectorAll(".card-s2");
  const choiceCardsS2_1 = document.querySelectorAll(".card-s2-1");
  const choiceCardsS3 = document.querySelectorAll(".card-s3");
  const choiceCardsS3_1 = document.querySelectorAll(".card-s3-1");
  const choiceCardsS3_2 = document.querySelectorAll(".card-s3-2");
  const choiceCardsS5 = document.querySelectorAll(".card-s5");
  const choiceCardsS5a = document.querySelectorAll(".card-s5a");
  const choiceCardsS5_1 = document.querySelectorAll(".card-s5-1");


  let currentStep = 0;
  const totalSteps = 7;

  updateButtonState();

  nextBtn.addEventListener("click", goToNextStep);
  prevBtn.addEventListener("click", goToPrevStep);

  function initRangeSliders() {
    function updateRangeColor(range) {
      const min = parseInt(range.min) || 1;
      const max = parseInt(range.max) || 5;
      const value = parseInt(range.value) || 4;
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

  initRangeSliders();

  // choiceCards.forEach((card) => {
  //   card.addEventListener("click", function () {
  //     const parentStep = this.closest(".form-step");
  //     parentStep.querySelectorAll(".choice-card").forEach((c) => {
  //       c.classList.remove("selected");
  //     });

  //     this.classList.add("selected");
  //   });
  // });

choiceCardsS0.forEach((card) => {
  card.addEventListener("click", function () {
    const parentStep = this.closest(".form-step");

    parentStep.querySelectorAll(".card-s0").forEach((c) => {
      c.classList.remove("selected");
      const input = c.querySelector('input[type="radio"]');
      if (input) input.checked = false;
    });

    this.classList.add("selected");
    const input = this.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  });
});

document.querySelectorAll(".form-step").forEach((step) => {
  const firstCard = step.querySelector(".card-s0");
  if (firstCard) {
    firstCard.classList.add("selected");
    const input = firstCard.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

    choiceCardsS1.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s1").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

  document.querySelectorAll(".form-step").forEach((step) => {
  const first1Card = step.querySelector(".card-s1");
  if (first1Card) {
    first1Card.classList.add("selected");
    const input = first1Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});
  

      choiceCardsS2.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s2").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

    document.querySelectorAll(".form-step").forEach((step) => {
  const first2Card = step.querySelector(".card-s2");
  if (first2Card) {
    first2Card.classList.add("selected");
    const input = first2Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

    choiceCardsS2_1.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s2-1").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

      document.querySelectorAll(".form-step").forEach((step) => {
  const first2_1Card = step.querySelector(".card-s2-1");
  if (first2_1Card) {
    first2_1Card.classList.add("selected");
    const input = first2_1Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

    choiceCardsS3.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s3").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

      document.querySelectorAll(".form-step").forEach((step) => {
  const first3Card = step.querySelector(".card-s3");
  if (first3Card) {
    first3Card.classList.add("selected");
    const input = first3Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

      choiceCardsS3_2.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s3-2").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

  document.querySelectorAll(".form-step").forEach((step) => {
  const first3_2Card = step.querySelector(".card-s3-2");
  if (first3_2Card) {
    first3_2Card.classList.add("selected");
    const input = first3_2Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

      choiceCardsS3_1.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s3-1").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

    document.querySelectorAll(".form-step").forEach((step) => {
  const first3_1Card = step.querySelector(".card-s3-1");
  if (first3_1Card) {
    first3_1Card.classList.add("selected");
    const input = first3_1Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

      choiceCardsS5_1.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s5-1").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

      document.querySelectorAll(".form-step").forEach((step) => {
  const first5_1Card = step.querySelector(".card-s5-1");
  if (first5_1Card) {
    first5_1Card.classList.add("selected");
    const input = first5_1Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

        choiceCardsS5.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s5").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

        document.querySelectorAll(".form-step").forEach((step) => {
  const first5Card = step.querySelector(".card-s5");
  if (first5Card) {
    first5Card.classList.add("selected");
    const input = first5Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

    choiceCardsS5a.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s5a").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;
    });
  });

          document.querySelectorAll(".form-step").forEach((step) => {
  const first5aCard = step.querySelector(".card-s5a");
  if (first5aCard) {
    first5aCard.classList.add("selected");
    const input = first5aCard.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});

  const floorSelection = document.getElementById("floorSelection");

  choiceCardsS1_1.forEach((card) => {
    card.addEventListener("click", function () {
      const parentStep = this.closest(".form-step");

      parentStep.querySelectorAll(".card-s1-1").forEach((c) => {
        c.classList.remove("selected");
        const input = c.querySelector('input[type="radio"]');
        if (input) input.checked = false;
      });

      this.classList.add("selected");
      const input = this.querySelector('input[type="radio"]');
      if (input) input.checked = true;

      // === Show/Hide Floor Selection ===
      if (input && (input.value === "Dachterrasse" || input.value === "Balkon")) {
        floorSelection.classList.remove("d-none");
      } else {
        floorSelection.classList.add("d-none");
      }
    });
  });

      document.querySelectorAll(".form-step").forEach((step) => {
  const first1_1Card = step.querySelector(".card-s1-1");
  if (first1_1Card) {
    first1_1Card.classList.add("selected");
    const input = first1_1Card.querySelector('input[type="radio"]');
    if (input) input.checked = true;
  }
});
const formSelectionBtns = document.querySelectorAll(".form-selection-btn");

formSelectionBtns.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.preventDefault();

    const parentRow = this.closest(".row");

    parentRow.querySelectorAll(".form-selection-btn").forEach((b) => {
      b.classList.remove("selected");
    });

    this.classList.add("selected");

    const input = this.nextElementSibling; 
    if (input && input.type === "radio") {
      input.checked = true;
    }
  });
});

document.querySelectorAll(".row").forEach((row) => {
  const firstBtn = row.querySelector(".form-selection-btn");
  if (firstBtn) {
    firstBtn.classList.add("selected");

    const input = firstBtn.nextElementSibling;
    if (input && input.type === "radio") {
      input.checked = true;
    }
  }
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
