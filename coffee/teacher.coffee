classChange = ->
  $("#challenges").empty();
  for challenge in challengesForClass[$("#class").val()]
    $("#challenges").append($("<option></option>")
      .attr("value", challenge.id)
      .text(challenge.name))

challengeChange = ->
  if _.find(challenges, id: +$("#challenges").val())?.extrapoints?
    $("#extra").prop("disabled", false)
  else
    $("#extra").prop("disabled", true)
    $("#extra").prop("checked", false)


$('document').ready ->
  classChange()
  challengeChange()
  $("#class").change(classChange)
  $("#challenges").change(challengeChange)
