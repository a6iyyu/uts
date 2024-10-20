// Menghitung Angka
const CountUpNumber = (number, time, element) => {
  if (!number || !time || number <= 0) return null;
  const interval_time = (time * 1000) / number;
  let current_number = 0;
  const current_element = document.getElementById(element);

  const format_number = (number) => {
    if (number >= 1e6) return (number / 1e6).toFixed(1) + "JT";
    else if (number >= 1e3) return (number / 1e3).toFixed(1) + "RB";
    return number.toString();
  };

  const interval = setInterval(() => {
    current_number++;
    if (current_element) current_element.textContent = format_number(current_number);
    if (current_number === number) clearInterval(interval);
  }, interval_time);
}