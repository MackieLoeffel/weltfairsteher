normalColor = "rgba(0,70,224,0.6)"
highlightColor = "rgba(255,0,85,1)"

class BarChart
  constructor: (@classes, canvas) ->
    bar =
      labels: ["Punkte"]#_.map(classes, "name")
      datasets: for c in @classes
        {
          label: c.name
          strokeColor: normalColor
          fillColor: normalColor #"rgba(7,108,240,0.6)"
          data: [c.points[c.points.length - 1]]
        }

    @chart = new Chart(canvas.getContext("2d")).Bar(bar, {barShowStroke: false});

  setClass: (id) ->
    for c, i in @classes
      console.log @chart.datasets[i]
      # not working, don't know why
      @chart.datasets[i].fillColor = if c.id == +id then highlightColor else normalColor
      @chart.update()


class LineChart
  constructor: (canvas) ->
    console.assert classes.length > 0, "there must be classes!"
    # - 1 for current date
    numdays = classes[0].points.length - 1
    milliPerDay = 24 * 3600 * 1000
    days = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"]

    chartConfig =
      chart:
        type: "line"

        renderTo: canvas
      title:
         style: {
                    color: 'red'
                }
        text: "Punkte über Zeit"
      xAxis:
        categories: [-numdays..0].map (i) ->
          #days[new Date(Date.now() + i * milliPerDay).getUTCDay()]
          date = new Date(Date.now() + i * milliPerDay)
          return "#{date.getUTCDate()}.#{date.getUTCMonth()+1}."
      yAxis:
        title:
          text: "Punkte"
      legend:
        layout: 'vertical'

        align: "right"
        verticalAlign: "middle"
        borderWidth: 0
      series: for c in classes.sort((a, b) -> b.points[b.points.length- 1] - a.points[a.points.length - 1])
        {
          name: c.name
          data: c.points
          color: normalColor
        }
    # console.log JSON.stringify chartConfig, true, 4
    @chart = new Highcharts.Chart(chartConfig);
    onClassSelectChanged @setClass
    return

  setClass: (id) =>
    return unless id?
    for c, i in classes
      @chart.series[i].update({color: if c.id == +id then highlightColor else normalColor}, false)
    @chart.redraw()

window.LineChart = LineChart
