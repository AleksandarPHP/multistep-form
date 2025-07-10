document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.querySelector(".navbar");
    const body = document.body;
    const mediaLogo = document.getElementById("media-logo");
    const regularLogo = document.getElementById("regular-logo");
    const regularLogo2 = document.getElementById("regular-logo2");
    const offcanvas = document.querySelector(".offcanvas");
    const btnClose = document.querySelector(".btn-close");

    body.style.paddingTop = "0";

    const isMobile = () => window.matchMedia("(max-width: 1440px)").matches;

    function updateNavbarStyles() {
        if (!navbar) return;

        const scrolled = window.scrollY > 250;

        if (scrolled) {
            navbar.classList.remove("transparent");
            btnClose.style.removeProperty("filter");

            if (mediaLogo) mediaLogo.src = "assets/images/black-logo.webp";
            if (regularLogo) regularLogo.src = "assets/images/black-logo.webp";
            if (regularLogo2)
                regularLogo2.src = "assets/images/black-logo.webp";

            if (isMobile()) {
                offcanvas.style.setProperty(
                    "background-color",
                    "var(--bs-offcanvas-bg)",
                    "important"
                );
            }
        } else {
            navbar.classList.add("transparent");
            btnClose.style.setProperty("filter", "invert(1)");

            if (mediaLogo) mediaLogo.src = "assets/images/white-logo.webp";
            if (regularLogo) regularLogo.src = "assets/images/white-logo.webp";
            if (regularLogo2)
                regularLogo2.src = "assets/images/white-logo.webp";

            if (isMobile()) {
                offcanvas.style.setProperty(
                    "background-color",
                    "#000",
                    "important"
                );
            } else {
                offcanvas.style.setProperty(
                    "background-color",
                    "transparent",
                    "important"
                );
            }
        }
    }

    function handleResize() {
        updateNavbarStyles();
    }

    if (navbar.classList.contains("transparent")) {
        updateNavbarStyles();
        window.addEventListener("scroll", updateNavbarStyles);
        window.addEventListener("resize", handleResize);
    }
});
