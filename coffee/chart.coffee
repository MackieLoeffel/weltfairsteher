normalColor = "rgba(0,70,224,0.6)"
highlightColor = "rgba(255,0,85,1)"

Highcharts.setOptions
  lang:
    months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember']
    shortMonths: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul",  "Aug", "Sep", "Okt", "Nov", "Dez"]
    weekdays: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag']
    resetZoom: "Zoom zurücksetzen"
    resetZoomTitle: "Zoom auf 1:1 zurücksetzen"
    decimalPoint: ","

class LineChart
  constructor: (canvas) ->
    console.assert classes.length > 0, "there must be classes!"
    # - 1 for current date
    numdays = classes[0].points.length - 1
    milliPerDay = 24 * 3600 * 1000
    days = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"]
    pointStart = Date.now() - numdays * milliPerDay
    maxPoints = _.max classes.map (c) -> _.last c.points

    chartConfig =
      chart:
        type: "line"
        renderTo: canvas
        backgroundColor: "#51DB74"
        zoomType: "x"
      title:
        text: "Punkte über Zeit"
      tooltip:
        dateTimeLabelFormats:
          millisecond:"%A, %e. %b"
      xAxis:
        type: "datetime"
        #categories: [-numdays..0].map (i) ->
        #  #days[new Date(Date.now() + i * milliPerDay).getUTCDay()]
        #  date = new Date(Date.now() + i * milliPerDay)
        #  return "#{date.getUTCDate()}.#{date.getUTCMonth()+1}."
      yAxis:
        title:
          text: "Punkte"
      legend:
        layout: 'vertical'
        align: "right"
        verticalAlign: "middle"
        borderWidth: 0
      series: (for c in classes.sort((a, b) -> _.last(b.points) - _.last(a.points))
        {
          name: c.name
          data: c.points
          color: normalColor
          pointStart: pointStart
          pointInterval: milliPerDay
        }).concat (for ms, i in milestones
          break if i > 0 && milestones[i-1].points > maxPoints
          {
            data: [ms.points, ms.points]
            color: "#F0F022"
            dashStyle: "Dash"
            showInLegend: false
            pointStart: pointStart
            pointInterval: Date.now() - pointStart
            marker:
              enabled: false
          })
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
