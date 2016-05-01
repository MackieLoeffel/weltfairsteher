classChange = ->
  $("#challenges").empty();
  for challenge in challengesForClass[$("#class").val()]
    $("#challenges").append($("<option></option>")
      .attr("value", challenge.id)
      .text(challenge.name))

challengeChange = ->
    $("#extra").toggle(_.find(challenges, id: +$("#challenges").val())?.extrapoints?)

$('document').ready ->
  classChange()
  challengeChange()
  $("#class").change(classChange)
  $("#challenges").change(challengeChange)
