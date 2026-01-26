function setupMobileNav() {
    if (typeof window !== "undefined") {
        window.__ranterMobileNav = true;
    }
    const openButton = document.querySelector("[data-mobile-menu-open]");
    const closeButton = document.querySelector("[data-mobile-menu-close]");
    const overlay = document.getElementById("mobile-menu-overlay");
    const panel = document.getElementById("mobile-menu");

    if (!openButton || !closeButton || !overlay || !panel) {
        return;
    }

    const focusableSelector = [
        "a[href]",
        "button:not([disabled])",
        "textarea:not([disabled])",
        "input:not([disabled])",
        "select:not([disabled])",
        '[tabindex]:not([tabindex="-1"])',
    ].join(",");

    function setOpenState(isOpen) {
        openButton.setAttribute("aria-expanded", String(isOpen));

        if (isOpen) {
            overlay.classList.remove("hidden");
            panel.classList.remove("-translate-x-full");
            panel.classList.add("translate-x-0");
            document.body.classList.add("overflow-hidden");

            const firstFocusable = panel.querySelector(focusableSelector);
            if (firstFocusable && typeof firstFocusable.focus === "function") {
                firstFocusable.focus();
            }
        } else {
            overlay.classList.add("hidden");
            panel.classList.add("-translate-x-full");
            panel.classList.remove("translate-x-0");
            document.body.classList.remove("overflow-hidden");
            openButton.focus();
        }
    }

    openButton.addEventListener("click", () => setOpenState(true));
    closeButton.addEventListener("click", () => setOpenState(false));
    overlay.addEventListener("click", () => setOpenState(false));

    panel.addEventListener("click", (event) => {
        const target = event.target;
        if (target instanceof HTMLElement && target.closest("a")) {
            setOpenState(false);
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            const isOpen = !overlay.classList.contains("hidden");
            if (isOpen) {
                event.preventDefault();
                setOpenState(false);
            }
        }
    });

    setOpenState(false);
}

document.addEventListener("DOMContentLoaded", setupMobileNav);
