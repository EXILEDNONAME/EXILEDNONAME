const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

function generateBubbleData(baseval, count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
    var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
    series.push([x, y, z]);
    baseval += 86400000;
    i++;
  }
  return series;
}

function generateData(count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = 'w' + (i + 1).toString();
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
    series.push({ x: x, y: y });
    i++;
  }
  return series;
}


const apexChart = "#charts";

if(this_url != '' && charts == 'true') {
  fetch(this_url + '/chart')
  .then(response => response.json())
  .then(data => {
    var created = data.created;
    var updated = data.updated;
    var deleted = data.deleted;
    var options = {
      series: [
        { name: 'Created', data: created },
        { name: 'Updated', data: updated },
        { name: 'Deleted', data: deleted },
      ],
      chart: { height: 350, type: 'area', zoom: { enabled: false } },
      dataLabels: { enabled: false },
      stroke: { curve: 'smooth' },
      xaxis: { categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] },
      colors: [success, warning, danger]
    };
    var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });
}
