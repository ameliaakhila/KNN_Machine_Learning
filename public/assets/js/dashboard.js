document.addEventListener("DOMContentLoaded", function () {
  const el = document.querySelector("#overview");

  if (!el) return;

  const categories = JSON.parse(el.dataset.categories || "[]");
  const data = JSON.parse(el.dataset.values || "[]");

  const options_sales_overview = {
    series: [
      {
        name: "Jumlah",
        data: data,
      },
    ],
    chart: {
      type: "bar",
      height: "100%",
      toolbar: { show: false },
      foreColor: "#adb0bb",
      fontFamily: "inherit",
    },
    xaxis: { categories: categories },
  };

  const chart = new ApexCharts(el, options_sales_overview);
  chart.render();
});
