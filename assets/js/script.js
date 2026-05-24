document.addEventListener("DOMContentLoaded", () => {
    const services = [
        { title: "Trademark Registration", price: "Packages Starting @ <span>₹999/-</span>" },
        { title: "Private Limited Registration", price: "Packages Starting @ <span>₹1699/-</span>" },
        { title: "GST Registration", price: "Packages Starting @ <span>₹699/-</span>" },
        { title: "LLP Annual Filing", price: "Packages Starting @ <span>₹1999/-</span>" },
        { title: "Startup India Registration", price: "Packages Starting @ <span>₹1299/-</span>" },
        { title: "ISO Certification", price: "Packages Starting @ <span>₹2499/-</span>" },
        { title: "FSSAI License", price: "Packages Starting @ <span>₹699/-</span>" }
    ];

    const container = document.getElementById("dynamic-services-container");
    const titleEl = document.getElementById("animated-service-title");
    const priceEl = document.getElementById("animated-service-price");

    if (container && titleEl && priceEl) {
        let currentIndex = 0;

        setInterval(() => {
            // Fade out
            container.classList.add("fade-out");

            // Wait for fade out transition (0.5s) to complete
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % services.length;
                titleEl.textContent = services[currentIndex].title;
                priceEl.innerHTML = services[currentIndex].price;

                // Fade back in
                container.classList.remove("fade-out");
            }, 500); // matches the CSS transition time
        }, 3000); // Change text every 3 seconds
    }

    // Modal Logic
    const openBtns = document.querySelectorAll(".openConsultationModalBtn");
    const modal = document.getElementById("consultationModal");
    const closeBtn = document.getElementById("modalClose");
    const overlay = document.getElementById("modalOverlay");

    if (openBtns.length > 0 && modal && closeBtn && overlay) {
        openBtns.forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.add("show");
                document.body.style.overflow = "hidden"; // Prevent scrolling
            });
        });

        const closeModal = () => {
            modal.classList.remove("show");
            document.body.style.overflow = ""; // Restore scrolling
        };

        closeBtn.addEventListener("click", closeModal);
        overlay.addEventListener("click", closeModal);
    }

    // Pricing Swiper Initialization
    if (document.querySelector('.pricing-swiper')) {
        new Swiper('.pricing-swiper', {
            direction: 'vertical',
            loop: false,
            slidesPerView: 1,
            spaceBetween: 30,
            mousewheel: {
                releaseOnEdges: true,
            },
            observer: true,
            observeParents: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.pricing-pagination',
                clickable: true,
            },
        });
    }
});
