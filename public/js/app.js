/**
 * Porto-Yogi — Main JavaScript
 * Handles: navbar scroll, mobile toggle, smooth scroll,
 * Swiper init, fade-in observer, Lucide icons
 */
document.addEventListener("DOMContentLoaded", () => {
    // ── Lucide Icons ──
    if (window.lucide) {
        lucide.createIcons();
    }

    // ── DOM References ──
    const navbar = document.getElementById("navbar");
    const toggle = document.getElementById("navbarToggle");
    const nav = document.getElementById("navbarNav");
    const overlay = document.getElementById("navbarOverlay");

    // ── Navbar scroll effect ──
    const onScroll = () => {
        if (navbar) {
            navbar.classList.toggle("scrolled", window.scrollY > 20);
        }
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    // ── Mobile toggle ──
    const isNavOpen = () => nav && nav.classList.contains("open");

    const openNav = () => {
        if (!nav || !toggle) return;
        nav.classList.add("open");
        toggle.classList.add("active");
        toggle.setAttribute("aria-expanded", "true");
        if (overlay) overlay.classList.add("visible");
        document.body.classList.add("nav-open");
    };

    const closeNav = () => {
        if (!nav || !toggle) return;
        nav.classList.remove("open");
        toggle.classList.remove("active");
        toggle.setAttribute("aria-expanded", "false");
        if (overlay) overlay.classList.remove("visible");
        document.body.classList.remove("nav-open");
    };

    const toggleNav = () => {
        isNavOpen() ? closeNav() : openNav();
    };

    // Toggle button click
    if (toggle) {
        toggle.addEventListener("click", (e) => {
            e.stopPropagation();
            toggleNav();
        });
    }

    // Close on overlay click
    if (overlay) {
        overlay.addEventListener("click", closeNav);
    }

    // Close on nav link click
    if (nav) {
        nav.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", closeNav);
        });
    }

    // Close on Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && isNavOpen()) {
            closeNav();
            if (toggle) toggle.focus();
        }
    });

    // Close menu on window resize (if viewport becomes desktop)
    let resizeTimer;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > 768 && isNavOpen()) {
                closeNav();
            }
        }, 100);
    });

    // ── Active nav link on scroll ──
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".navbar-nav a");
    const setActiveLink = () => {
        let current = "";
        const scrollPos = window.scrollY + 120;
        sections.forEach((section) => {
            const top = section.offsetTop;
            const bottom = top + section.offsetHeight;
            if (scrollPos >= top && scrollPos < bottom) {
                current = section.getAttribute("id");
            }
        });
        navLinks.forEach((link) => {
            const href = link.getAttribute("href");
            link.classList.toggle(
                "active",
                href === "#" + current
            );
        });
    };
    window.addEventListener("scroll", setActiveLink, { passive: true });
    setActiveLink();

    // ── Fade-in on scroll (Intersection Observer) ──
    const fadeEls = document.querySelectorAll(".fade-in");
    if (fadeEls.length) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.15 }
        );
        fadeEls.forEach((el) => observer.observe(el));
    }

    // ── Swiper.js — Blog Carousel ──
    if (window.Swiper) {
        new Swiper(".blog-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }
});
