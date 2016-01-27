classChange = ->
  $("#challenges").empty();
  for challenge in challenges[$("#class").val()]
    $("#challenges").append($("<option></option>")
      .attr("value", challenge.id)
      .text(challenge.name))

$('document').ready ->
  classChange()
  $("#class").change(classChange)
