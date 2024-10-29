// Indikator Gulir
const scroll_indicator = document.getElementById("scroll-indicator");

const ScrollIndicator = () => {
  const scroll_height = document.documentElement.scrollHeight - window.innerHeight;
  const scroll_percentage = (window.scrollY / scroll_height) * 100;
  scroll_indicator.style.width = `${scroll_percentage}%`;
};

window.addEventListener("scroll", ScrollIndicator);

// Gulir Ke Tujuan
document.getElementById("mulai-belanja").addEventListener("click", () => {
  document.getElementById("daftar-alat-musik").scrollIntoView({
    behavior: "smooth",
  });
});

// Tinggi Otomatis Pada Textarea
const textarea = document.getElementById("deskripsi");
if (textarea) textarea.style.height = "auto", textarea.style.height = `${textarea.scrollHeight}px`;

// Validasi Formulir
const nama_produk = document.getElementById("nama_produk");