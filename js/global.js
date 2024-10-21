// Menghitung Angka
const CountUpNumber = (number, time, element) => {
  if (!number || !time || number <= 0) return null;

  const current_element = document.getElementById(element);
  const interval_time = 1000 / 60; // Set 60 FPS untuk animasi yang lebih halus
  let current_number = 0;
  const increment = number / (time * 1000 / interval_time); // Jumlah total langkah iterasi

  const format_number = number => {
    if (number >= 1e6) return (number / 1e6).toFixed(1) + "\u00A0JT";
    else if (number >= 1e3) return (number / 1e3).toFixed(1) + "\u00A0RB";
    return number.toString();
  };

  const interval = setInterval(() => {
    current_number += increment;
    current_element.textContent = format_number(Math.floor(current_number));
    if (current_number >= number) clearInterval(interval), current_element.textContent = format_number(number);
  }, interval_time);
};

// Efek Parallax Tilt
const ParallaxTilt = element_name => {
  const element = document.getElementById(element_name);
  document.addEventListener("mousemove", e => {
    const x_move = e.clientX / window.innerWidth;
    const y_move = e.clientY / window.innerHeight;
    const tilt_x = (y_move - 0.5) * 20;
    const tilt_y = (x_move - 0.5) * -20;
    element.style.transform = `rotateX(${tilt_y}deg) rotateY(${tilt_x}deg)`;
  });
};

// Indikator Gulir
const scroll_indicator = document.getElementById("scroll-indicator");

const ScrollIndicator = () => {
  const scroll_height = document.documentElement.scrollHeight - window.innerHeight;
  const scroll_percentage = (window.scrollY / scroll_height) * 100;
  scroll_indicator.style.width = `${scroll_percentage}%`;
};

window.addEventListener("scroll", ScrollIndicator);

// Gulir Ke Atas
const scroll_to_top = document.getElementById("scroll-to-top");
window.addEventListener("scroll", () => window.scrollY > 25 * 16 ? scroll_to_top.classList.remove("invisible", "opacity-0") : scroll_to_top.classList.add("invisible", "opacity-0"));
scroll_to_top.addEventListener("click", () => window.scrollTo({ behavior: "smooth", top: 0 }));

CountUpNumber(4_200, 7, "star-on-github");
CountUpNumber(82_600, 7, "fork-on-github");
CountUpNumber(10_000_000, 7, "download-on-github");
CountUpNumber(100_000, 7, "member-on-github");