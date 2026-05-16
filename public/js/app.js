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

    // ── Navbar scroll effect ──
    const navbar = document.getElementById("navbar");
    const onScroll = () => {
        navbar.classList.toggle("scrolled", window.scrollY > 20);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    // ── Mobile toggle ──
    const toggle = document.getElementById("navbarToggle");
    const nav = document.getElementById("navbarNav");
    if (toggle && nav) {
        toggle.addEventListener("click", () => {
            nav.classList.toggle("open");
            toggle.classList.toggle("active");
        });
        // Close on link click
        nav.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", () => {
                nav.classList.remove("open");
                toggle.classList.remove("active");
            });
        });
    }

    // ── Active nav link on scroll ──
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".navbar-nav a");
    const setActiveLink = () => {
        let current = "";
        sections.forEach((section) => {
            const top = section.offsetTop - 100;
            if (window.scrollY >= top) {
                current = section.getAttribute("id");
            }
        });
        navLinks.forEach((link) => {
            link.classList.toggle(
                "active",
                link.getAttribute("href") === "#" + current
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
