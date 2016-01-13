// Generated by CoffeeScript 1.9.1
var BarChart, LineChart, highlightColor, normalColor;

normalColor = "rgba(0,70,224,0.6)";

highlightColor = "rgba(255,0,85,1)";

BarChart = (function() {
  function BarChart(classes, canvas) {
    var bar, c;
    this.classes = classes;
    bar = {
      labels: ["Punkte"],
      datasets: (function() {
        var j, len, ref, results;
        ref = this.classes;
        results = [];
        for (j = 0, len = ref.length; j < len; j++) {
          c = ref[j];
          results.push({
            label: c.name,
            strokeColor: normalColor,
            fillColor: normalColor,
            data: [c.points[c.points.length - 1]]
          });
        }
        return results;
      }).call(this)
    };
    this.chart = new Chart(canvas.getContext("2d")).Bar(bar, {
      barShowStroke: false
    });
  }

  BarChart.prototype.setClass = function(id) {
    var c, i, j, len, ref, results;
    ref = this.classes;
    results = [];
    for (i = j = 0, len = ref.length; j < len; i = ++j) {
      c = ref[i];
      console.log(this.chart.datasets[i]);
      this.chart.datasets[i].fillColor = c.id === +id ? highlightColor : normalColor;
      results.push(this.chart.update());
    }
    return results;
  };

  return BarChart;

})();

LineChart = (function() {
  function LineChart(classes, canvas) {
    var c, days, j, line, milliPerDay, numdays, ref, results;
    this.classes = classes;
    console.assert(this.classes.length > 0, "there must be classes!");
    numdays = this.classes[0].points.length - 1;
    milliPerDay = 24 * 3600 * 1000;
    days = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"];
    line = {
      labels: (function() {
        results = [];
        for (var j = ref = -numdays; ref <= 0 ? j <= 0 : j >= 0; ref <= 0 ? j++ : j--){ results.push(j); }
        return results;
      }).apply(this).map(function(i) {
        var date;
        date = new Date(Date.now() + i * milliPerDay);
        return (date.getUTCDate()) + "." + (date.getUTCMonth() + 1) + ".";
      }),
      datasets: (function() {
        var k, len, ref1, results1;
        ref1 = this.classes;
        results1 = [];
        for (k = 0, len = ref1.length; k < len; k++) {
          c = ref1[k];
          results1.push({
            label: c.name,
            strokeColor: normalColor,
            fillColor: "rgba(7,108,240,0.6)",
            data: c.points
          });
        }
        return results1;
      }).call(this)
    };
    this.chart = new Chart(canvas.getContext("2d")).Line(line, {
      bezierCurveTension: 0.2,
      pointDot: false,
      datasetFill: false
    });
  }

  LineChart.prototype.setClass = function(id) {
    var c, i, j, len, ref, results;
    ref = this.classes;
    results = [];
    for (i = j = 0, len = ref.length; j < len; i = ++j) {
      c = ref[i];
      this.chart.datasets[i].strokeColor = c.id === +id ? highlightColor : normalColor;
      results.push(this.chart.update());
    }
    return results;
  };

  return LineChart;

})();
