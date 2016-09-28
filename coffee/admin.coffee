
window.acceptSelfmade = ->
  sendForm "#acceptSelfmade", api: "addChallenge", cb: (errors) ->
    # there is a race condition between adding and deleting here, but we don't care
    return if errors.length
    callApi "deleteEntry", table: "suggested", id: $("#selfmadeSelect").val()

selectSelfmade = ->
  id = $("#selfmadeSelect").val()
  console.log "selected:", id
  for prop in ["title", "points", "class", "description", "location", "extrapoints"]
    # space is descendant selector
    $("#acceptSelfmade [name='#{prop}']").val(suggestedChallenges[id][prop] ? "")
  $("#class-name").text suggestedChallenges[id].name
  $("#teacher-email").text suggestedChallenges[id].email

$('document').ready ->
  first = null
  for id of suggestedChallenges
    first = id
    break
  if first?
    $("#selfmadeSelect").val first
    $("#selfmadeSelect").change selectSelfmade
    selectSelfmade()

  $(".slide-down .slide-down-header").each  ->
    $(this).click -> toggleArrow this, $(this).siblings(".slide-down-hidden")

  return
