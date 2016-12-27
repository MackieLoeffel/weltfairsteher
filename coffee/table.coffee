$(document).ready ->
  window.app = new Vue
    el: "#vue-root"
    data:
      cclass: null
      categories: categories
    computed:
      maxCategoryNum: -> _.max categories.map((c) -> c.num)
      currentPoints: -> Math.round(_.last(@cclass.points) * 10) / 10
      nextMilestone: ->
        bigger = milestones.filter((m) => m.points > @currentPoints)
        return "--" if bigger.length == 0
        return Math.round((_.min(bigger.map((b) -> b.points)) - @currentPoints) * 10) / 10
    methods:
      calcBgWidth: (num) -> _.max([(num / @maxCategoryNum * 90), 13])

  onClassSelectChanged (c) ->
    if c == "default"
      app.cclass = null
    else
      app.cclass = _.find classes, {id: +c}

    return
