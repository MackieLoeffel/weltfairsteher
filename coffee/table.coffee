$(document).ready ->
  onClassSelectChanged (c) ->
    return if c == "default"
    classData = _.find classes, {id: +c}
    $("#class-name").text classData.name
    return
