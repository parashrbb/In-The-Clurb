// ========== JOIN US FORM INTERAKSI ==========
const joinBtn = document.querySelector(".btn.btn-primary");
joinBtn.addEventListener("click", (e) => {
  e.preventDefault();

  // buat form input jika belum ada
  if (!document.querySelector(".join-form")) {
    const form = document.createElement("form");
    form.classList.add("join-form");
    form.innerHTML = `
      <input type="text" placeholder="Your Name" required><br>
      <input type="email" placeholder="Your Email" required><br>
      <input type="url" placeholder="Portfolio Link (optional)"><br>
      <button type="submit">Submit</button>
    `;
    document.querySelector(".joinclurb-content").appendChild(form);

    // event submit
    form.addEventListener("submit", (ev) => {
      ev.preventDefault();
      alert("🎉 Thanks for joining The Clurb! We'll contact you soon.");
      form.remove(); // hapus form setelah submit
    });
  }
});


// ========== SMOOTH SCROLL UNTUK NAVBAR ==========
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener("click", function(e) {
    e.preventDefault();
    const targetId = this.getAttribute("href");
    const targetEl = document.querySelector(targetId);
    if (targetEl) {
      targetEl.scrollIntoView({ behavior: "smooth" });
    }
  });
});


// ========== REVEAL ON SCROLL ==========
const revealEls = document.querySelectorAll(".reveal");

function revealOnScroll() {
  const windowHeight = window.innerHeight;
  revealEls.forEach(el => {
    const elTop = el.getBoundingClientRect().top;
    const revealPoint = 120;
    if (elTop < windowHeight - revealPoint) {
      el.classList.add("active");
    }
  });
}
window.addEventListener("scroll", revealOnScroll);
revealOnScroll();


// ========== MODAL UNTUK GAMBAR MODEL ==========
const images = document.querySelectorAll(".model-img-wrapper img");
const modal = document.createElement("div");
modal.classList.add("modal");
modal.innerHTML = `<div class="modal-content"><span class="close">&times;</span><img src="" alt=""></div>`;
document.body.appendChild(modal);

const modalImg = modal.querySelector("img");
const closeBtn = modal.querySelector(".close");

images.forEach(img => {
  img.addEventListener("click", () => {
    modal.style.display = "flex";
    modalImg.src = img.src;
  });
});

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

modal.addEventListener("click", (e) => {
  if (e.target === modal) modal.style.display = "none";
});

// ========== HIGHLIGHT MENU SAAT SECTION AKTIF ==========
const sections = document.querySelectorAll("main section");
const navLinks = document.querySelectorAll(".menu a");

window.addEventListener("scroll", () => {
  let current = "";
  sections.forEach(sec => {
    const secTop = sec.offsetTop - 70;
    const secHeight = sec.clientHeight;
    if (pageYOffset >= secTop && pageYOffset < secTop + secHeight) {
      current = sec.getAttribute("id");
    }
  });

  navLinks.forEach(link => {
    link.classList.remove("active");
    if (link.getAttribute("href") === "#" + current) {
      link.classList.add("active");
    }
  });
});
