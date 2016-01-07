normalColor = "rgba(0,70,224,0.6)"
highlightColor = "rgba(139,0,112,1)"

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
  constructor: (@classes, canvas) ->
    console.assert @classes.length > 0, "there must be classes!"
    # - 1 for current date
    numdays = @classes[0].points.length - 1
    milliPerDay = 24 * 3600 * 1000
    days = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"]
    line = {
      labels: [-numdays..0].map (i) -> days[new Date(Date.now() + i * milliPerDay).getUTCDay()]
      datasets: for c in @classes
        {
          label: c.name
          strokeColor: normalColor
          fillColor: "rgba(7,108,240,0.6)"
          data: c.points
        }
    }
    @chart = new Chart(canvas.getContext("2d")).Line line,
      bezierCurveTension: 0.2
      pointDot: false
      datasetFill: false

  setClass: (id) ->
    for c, i in @classes
      @chart.datasets[i].strokeColor = if c.id == +id then highlightColor else normalColor
      @chart.update()
